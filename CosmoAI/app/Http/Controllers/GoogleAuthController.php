<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
                return redirect('/chat');
            } else {
                return redirect('/signup')->with('email', $googleUser->getEmail());
            }
        } catch (Exception $e) {
            // Handle login error
            logger('Google login error', ['message' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Something went wrong or you cancelled login.');
        }
    }
}
