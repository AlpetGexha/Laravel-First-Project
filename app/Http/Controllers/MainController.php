<?php

namespace App\Http\Controllers;

use AboutUs;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostSaves;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

use function PHPUnit\Framework\at;

class MainController extends Controller
{

    public function showBallina()
    {
        return view('ballina');
    }

    public function show(Post $post, Request $r)
    {
        // Limito Userin per 1 shikim per minut
        if (RateLimiter::remaining($r->ip(), $perMinute = 1)) {
            RateLimiter::hit($r->ip());
            // dd($r->ip());
            $post->update(['views' => $post->views + 1]);
        }

        return view('post.single', compact('post'));
    }

    public function showUser(User $user)
    {
        $user = User::find($user->id);
        return view('user.show', compact('user'));
    }

    public  function showCategory(Category $category)
    {
        // nese kategoria eshte private(0) aborto
        $categorys = Category::findOrFail($category->id);
        if (!$categorys->is_active == 1) {
            abort(404);
        }
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

    public function showAdminDashboard(User $user, Post $post, Category $category)
    {
        $sessions = DB::table('sessions')->count();
        return view('admin.dashboard.dashboard', compact('user', 'post', 'category', 'sessions'));
    }

    public function showAdminCategory()
    {
        return view('admin.category.table');
    }

    public function showPostSave(PostSaves $post)
    {
        return view('post.save', compact('post'));
    }

    public function showPostLike()
    {
        return view('post.like');
    }

    public function showAdminPost()
    {
        return view('admin.post.table');
    }

    public function showAdimRole(User $user)
    {
        return view('admin.role.table', compact('user'));
    }

    public function showAdminUser(User $user)
    {
        return view('admin.user.table', compact('user'));
    }
}
