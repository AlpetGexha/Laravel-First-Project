<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'slug',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->hasMany(PostCategory::class);
    }
}
