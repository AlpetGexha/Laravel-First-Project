<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'mbiemri',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function profile()
    {
        return $this->hasMany(UserProfile::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLikes::class);
    }

    public function saves()
    {
        return $this->hasMany(PostSaves::class);
    }

    public function followers()
    {
        return $this->hasMany(Follow::class);
    }

    public function isFollow(User $user)
    {
        return (bool) $this->followers()->where('following', $user->id)->exists();
    }

    public function hasProfile()
    {
        return (bool) $this->profile()->exists();
    }
}
