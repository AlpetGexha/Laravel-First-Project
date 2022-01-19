<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'bio',
        'user_id',
        'location',
        'url',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'twitch',
        'linkedin',
        'github',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
