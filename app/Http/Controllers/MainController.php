<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;


class MainController extends Controller
{

    public function showBallina(){
        return view('ballina');
    }

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

    public function showChatId(User $user)
    {
        return view('user.chat', compact('user'));
    }

    public function showChat()
    {
        return view('user.chat');
    }

    public  function showCreatePost()
    {
        return view('auth.post');
    }

    public function showAdminDashboard()
    {
        return view('dashboard');
    }

    public function showAdminCategory()
    {
        return view('admin.category.table');
    }

    public function showAdminPost()
    {
        return view('admin.post.table');
    }
}