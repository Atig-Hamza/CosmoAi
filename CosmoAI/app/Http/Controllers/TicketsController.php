<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    public function openTicket(Request $request, Tickets $ticket)
    {
        $request->validate([
            'problem' => 'required',
            'email' => 'required',
            'attachment' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $ticket->ticket_id = '#Ticket-' . \Str::random(12);

        $ticket->problem = $request->problem;
        $ticket->email = $request->email;

        $ticket->user_id = auth()->user()->id;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('attachments', $fileName, 'public');
            $ticket->attachment = $filePath;
        }

        $ticket->save();

        return back()->with('success', 'Ticket opened successfully.');

    }

    public function responseTicket(Request $request, Tickets $ticket)
    {
        $request->validate([
            'response' => 'required',
        ]);

        $ticket->status = 'closed';
        $ticket->closed_by = session()->get('support_name');
        $ticket->closer_id = session()->get('support_id');

        $ticket->response = $request->response;
        $username = User::where('id', $ticket->user_id)->first()->full_name;

        Mail::html('
<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 30px; color: #333;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); padding: 30px;">
        
        <!-- Logo -->
        <div style="text-align: center; margin-bottom: 20px;">
            <div style="width: 80px; margin: auto;">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" height="100%" viewBox="0 0 300.000000 300.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,300.000000) scale(0.100000,-0.100000)" fill="#4F46E5" stroke="none">
                        <path d="M829 2424 c-35 -77 -69 -234 -75 -339 -6 -107 12 -263 40 -347 16 -45 16 -46 -18 -114 -31 -64 -121 -323 -114 -329 2 -1 40 -18 86 -38 123 -52 185 -93 278 -180 89 -84 155 -168 223 -284 81 -138 137 -178 251 -178 122 0 166 32 265 193 140 229 298 373 496 452 45 18 79 38 79 46 0 28 -64 212 -102 296 l-40 87 22 88 c47 182 37 404 -27 592 -37 110 -39 111 -115 68 -157 -89 -312 -265 -388 -442 l-20 -46 -67 8 c-75 9 -143 10 -217 3 l-49 -4 -41 80 c-53 102 -93 159 -163 235 -81 87 -234 199 -272 199 -7 0 -21 -21 -32 -46z m302 -404 c22 -38 56 -104 75 -147 37 -86 30 -82 134 -64 89 15 206 14 324 -4 55 -8 100 -14 102 -13 1 2 14 34 29 73 36 88 85 174 146 250 54 69 126 141 133 134 15 -14 28 -168 24 -269 -4 -94 -11 -131 -36 -204 l-30 -88 33 -62 c44 -79 98 -215 92 -230 -3 -6 -29 -24 -58 -40 -115 -62 -236 -167 -347 -301 l-33 -40 4 95 c4 118 18 147 90 188 74 42 115 78 137 123 32 61 28 72 -22 64 -151 -23 -230 -91 -290 -248 -16 -41 -22 -92 -29 -236 -10 -203 -14 -213 -74 -230 -44 -12 -80 -4 -108 25 -23 22 -24 33 -30 186 -9 229 -34 313 -123 408 -48 -52 -112 -84 -186 -94 -44 -7 -48 -6 -48 -14 0 -50 69 -129 149 -169 48 -25 79 -63 85 -105 11 -69 16 -176 9 -176 -5 1 -35 35 -67 77 -73 93 -177 182 -287 247 -46 27 -85 50 -87 52 -6 4 50 139 91 215 l40 77 -26 73 c-30 84 -47 177 -47 262 0 57 16 187 26 217 8 22 154 -135 205 -220z"/>
                    </g>
                </svg>
            </div>
            <h2 style="font-size: 24px; color: #000; margin: 10px 0 0;">Cosmo</h2>
        </div>

        <!-- Content -->
        <h3 style="font-size: 18px; color: #111111; margin-top: 0;">Ticket ID: <span style="color: #4F46E5;">' . $ticket->ticket_id . '</span></h3>

        <p style="font-size: 16px; margin: 10px 0;">Hi <strong>' . $username . '</strong>,</p>

        <p style="font-size: 16px; line-height: 1.6;">' . nl2br(e($ticket->response)) . '</p>

        <!-- Footer -->
        <div style="margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px; font-size: 13px; color: #777;">
            <p>This email was sent from <strong>Cosmo Support</strong>. Please do not reply directly.</p>
        </div>
    </div>
</div>
', function ($message) use ($ticket) {
            $message->to($ticket->email)
                ->subject('Ticket Response from Cosmo');
        });

        $ticket->save();

        return back()->with('success', 'Response sent successfully.');
    }

}
