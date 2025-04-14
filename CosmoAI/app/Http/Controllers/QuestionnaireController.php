<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'primary_role' => 'nullable|string|max:255',
            'size_of_company' => 'nullable|string|max:255',
            'primarily_hope' => 'nullable|string|max:255',
            'important_features' => 'nullable|string|max:255',
            'familiarity' => 'nullable|string|max:255',
            'hear_about_us' => 'nullable|string|max:255',
            'feature_wish' => 'nullable|string|max:255',
            'satisfaction_with_other' => 'nullable|string|max:255',
            'anticipations' => 'nullable|string|max:255',
            'suggestions' => 'nullable|string|max:255',
        ]);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only([
                'primary_role',
                'size_of_company',
                'primarily_hope',
                'important_features',
                'familiarity',
                'hear_about_us',
                'feature_wish',
                'satisfaction_with_other',
                'anticipations',
                'suggestions',
            ])
        );

        return redirect()->route('chat');
    }
}
