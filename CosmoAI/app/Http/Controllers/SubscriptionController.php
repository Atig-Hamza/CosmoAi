<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $planId = 2;

        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $planId,
        ]);

        $user->profile()->update([
            'plan' => 'Pro',
            'plan_start' => now(),
            'plan_end' => now()->addDays(30),
        ]);

        return redirect()->route('plan');
    }
}
