<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function updatePlans(Request $request)
    {
        $plan = Plans::find($request->id);
        $plan->name = $request->name;
        $plan->description = $request->description;
        $plan->price = $request->price;
        $plan->save();
        return back()->with('success', 'Plan updated successfully');
    }
}
