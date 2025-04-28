<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = [
        'ticket_id',
        'problem',
        'email',
        'status',
        'response',
        'attachment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
