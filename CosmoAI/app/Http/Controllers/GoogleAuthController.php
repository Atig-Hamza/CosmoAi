<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Str;

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
            } else {
                $user = User::create([
                    'full_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)),
                    'country' => 'Unknown',
                    'currency' => 'USD',
                ]);

                Auth::login($user);
            }

            return redirect('/questionnaire');
        } catch (Exception $e) {
            logger('Google login error', ['message' => $e->getMessage()]);
            return redirect('/login')->with('error', 'Something went wrong or you cancelled login.');
        }
    }

}
