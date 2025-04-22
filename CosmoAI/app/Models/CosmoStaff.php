<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CosmoStaff extends Model
{
    protected $table = 'cosmo_staff';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}
