<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
