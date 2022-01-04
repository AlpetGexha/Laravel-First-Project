<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // $post->update(['views' => $post->views + 1]);
        return view('post.single', compact('post'));
    }
    public function showUser(User $user)
    {
        return view('user.show', compact('user'));
    }
}
