<?php

namespace App\Http\Controllers;

use App\Models\CosmoStaff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function signup(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
            'country' => 'required|string|max:255',
            'currency' => 'required|string|max:255',
        ]);

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withErrors(['message' => 'Passwords do not match.']);
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['message' => 'This email already exists.']);
        }

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'country' => $request->country,
            'currency' => $request->currency
        ]);

        return redirect()->route('login');
    }


    public function login(Request $request, CosmoStaff $cosmoStaff)
    {

        $credentials = $request->only('email', 'password');
        
        if ($cosmoStaff->where('email', $credentials['email'])->exists() && \Hash::check($credentials['password'], $cosmoStaff->where('email', $credentials['email'])->first()->password)) {
            if ($cosmoStaff->where('email', $credentials['email'])->first()->role == 'admin') {
                session()->put('is_admin', true);
                return redirect()->route('admin-dash');
            }
            else {
                session()->put('is_support', true);
                session()->put('support_id', $cosmoStaff->where('email', $credentials['email'])->first()->id);
                session()->put('support_name', $cosmoStaff->where('email', $credentials['email'])->first()->name);
                return redirect()->route('Tickets');
            }
        }

        if (auth()->attempt($credentials)) {
            return redirect()->route('questionnaire');
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid email or password.']);
        }
    }

    public function createUser(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', 
        ]);

        $password = \Str::random(12);
        
        $user->create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => \Hash::make($password),
            'country' => 'Unknown',
            'currency' => 'USD',
        ]);

        Mail::raw("Hi {$user->full_name},\n\nYour account has been created. Your email: {$request->email} and temporary password: {$password}", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Account Created');
        });

        return back();
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('login');
    }
}
