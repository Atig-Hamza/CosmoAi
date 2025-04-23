<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportCandidates extends Model
{
    protected $table = 'support_candidates';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'CV',
        'details',
    ];
}
