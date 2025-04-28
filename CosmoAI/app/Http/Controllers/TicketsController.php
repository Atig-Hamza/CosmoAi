<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function openTicket(Request $request, Tickets $ticket) {
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
}
