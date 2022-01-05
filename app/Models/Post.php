<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'tags',
        'photo',
        'likes',
        'saves',
        'commnets',
        'views',
        'user_id',
        'category_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categorys()
    {
        return  $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLikes::class);
    }

    public function isLikedByUser(User $user)
    {
        return (bool) $this->likes->where('user_id', $user->id)->count();
    }


    public function saves()
    {
        return $this->hasMany(PostSaves::class);
    }

    public function isSavedByUser(User $user)
    {
        return (bool) $this->saves->where('user_id', $user->id)->count();
    }

    public function category()
    {
        return $this->hasMany(PostCategory::class);
    }
}
