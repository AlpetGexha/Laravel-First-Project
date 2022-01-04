<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->update(['views' => $post->views + 1]);
        return view('post.single', compact('post'));
    }
}
