<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
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
        'plan',
        'plan_start',
        'plan_end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
