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
}
