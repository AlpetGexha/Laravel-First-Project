<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->update(['views' => $post->views + 1]);
        return view('post.single', compact('post'));
    }

    public function showUser(User $user)
    {
        return view('user.show', compact('user'));
    }

    public  function showCategory(Category $category)
    {
        $category->update(['views' => $category->views + 1]);
        return view('category.single', compact('category'));
    }
}
