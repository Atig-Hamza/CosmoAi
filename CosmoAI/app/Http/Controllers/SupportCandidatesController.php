<?php

namespace App\Http\Controllers;

use App\Models\SupportCandidates;
use Illuminate\Http\Request;

class SupportCandidatesController extends Controller
{
    public function sendSupportCandidate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'CV' => 'required|file',
            'details' => 'required',
        ]);

        if ($request->hasFile('CV')) {
            $cvPath = $request->file('CV')->store('cvs', 'public');
            $validatedData['CV'] = $cvPath;
        }

        $supportCandidate = new SupportCandidates($validatedData);
        $supportCandidate->status = 'pending';
        $supportCandidate->save();

        return back()->with('success', 'Support candidate sent successfully.');
    }


}
