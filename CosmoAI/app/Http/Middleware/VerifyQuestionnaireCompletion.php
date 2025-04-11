<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyQuestionnaireCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (
            is_null($user->primary_role) ||
            is_null($user->size_of_company) ||
            is_null($user->primarily_hope) ||
            is_null($user->important_features) ||
            is_null($user->familiarity) ||
            is_null($user->hear_about_us) ||
            is_null($user->feature_wish) ||
            is_null($user->satisfaction_with_other) ||
            is_null($user->anticipations)
        ) {
            return $next($request);
        }
        return redirect()->route('chat');
    }
}
