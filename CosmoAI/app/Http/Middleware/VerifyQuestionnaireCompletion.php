<?php

namespace App\Http\Middleware;

use App\Models\User;
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
    public function handle(Request $request, Closure $next, User $user): Response
    {
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
            return redirect()->route('questionnaire');
        }

        return $next($request);
    }
}
