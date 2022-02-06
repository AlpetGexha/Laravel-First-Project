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

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }


    /**
     * get id category from name
     * 
     * @param string $name
     */

    public function getIdFromName(String $name)
    {
        $category = Category::where('category', $name)->first();
        return $category->id;
    }

    public function getLastId()
    {
        $category = Category::orderBy('id', 'desc')->first();
        return $category->category;
    }
}
