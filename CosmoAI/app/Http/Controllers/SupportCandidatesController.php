<?php

namespace App\Http\Controllers;

use App\Models\CosmoStaff;
use App\Models\SupportCandidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function acceptSupportCandidate(Request $request, $id, CosmoStaff $cosmoStaff)
    {
        $supportCandidate = SupportCandidates::findOrFail($id);
        $supportCandidate->status = 'approved';
        $supportCandidate->save();

        $password = \Str::random(8);

        $cosmoStaff->name = $supportCandidate->name;
        $cosmoStaff->email = $supportCandidate->email;
        $cosmoStaff->role = 'support';
        $cosmoStaff->password = \Hash::make($password);
        $cosmoStaff->save();

        Mail::raw("Hi {$supportCandidate->name},\n\nYour support application has been approved. Your email: {$supportCandidate->email} and password: {$password}", function ($message) use ($supportCandidate) {
            $message->to($supportCandidate->email)
                ->subject('Support Application Approved');
        });

        return back()->with('success', 'Support candidate accepted successfully.');
    }

    public function rejectSupportCandidate(Request $request, $id)
    {
        $supportCandidate = SupportCandidates::findOrFail($id);
        $supportCandidate->status = 'rejected';
        $supportCandidate->save();

        Mail::raw("Hi {$supportCandidate->name},\n\nUnfortunately, your support application has been rejected.", function ($message) use ($supportCandidate) {
            $message->to($supportCandidate->email)
                ->subject('Support Application Rejected');
        });

        return back()->with('success', 'Support candidate rejected successfully.');
    }

}
