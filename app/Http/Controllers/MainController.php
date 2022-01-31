<?php

namespace App\Http\Controllers;

use App\Models\{Category, Post, PostSaves, User};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\{SEOMeta, OpenGraph};


class MainController extends Controller
{

    public function showBallina()
    {
        return view('ballina');
    }

    public function show(Post $post, Request $r)
    {
        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->body);
        SEOMeta::addMeta('article:created_at', $post->created_at->toW3CString(), 'property');
        foreach ($post->category as $category) {
            SEOMeta::addMeta('article:category', $category->category->category, 'property');
        }
        foreach ($post->category as $category) {
            SEOMeta::addKeyword($category->category->category);
        }
        OpenGraph::setTitle($post->title);
        OpenGraph::setDescription($post->body);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('article:author', $post->user->username);
        OpenGraph::addImage(asset('storage/' . $post->photo));

        // Limito Userin per 1 shikim per minut
        if (RateLimiter::remaining($r->ip() . $post->id, $perMinute = 1)) {
            RateLimiter::hit($r->ip() . $post->id);
            // dd($r->ip());
            $post->update(['views' => $post->views + 1]);
        }

        return view('post.single', compact('post'));
    }

    public function postEdit(Post $post)
    {
        SEOMeta::setTitle('Ndryshimi i postimit - ' . $post->title);
        $post = Post::findOrFail($post->id);
        if (auth()->user()->id !== $post->user_id) {
            session()->flash('error', 'Nuk keni access');
            // return redirect()->route('post.single', ['post' => $post->slug]);
            return redirect()->back();
        }
        // $this->authorize('user_post_edit', $post->user_id);
        return view('post.edit', compact('post'));
    }

    public function showUser(User $user)
    {
        SEOMeta::setTitle($user->username);
        OpenGraph::setTitle('Profile of ' . $user->username)
            // ->setDescription($user->hasProfile() ? $user->profile->bio : 'No bio')
            ->setType('profile')
            ->setProfile([
                'first_name' => $user->name,
                'last_name' => $user->mbiemri,
                'username' => $user->username,
            ]);

        $user = User::findOrFail($user->id);
        return view('user.show', compact('user'));
    }

    public  function showCategory(Category $category)
    {
        SEOMeta::setTitle($category->category);
        SEOMeta::setTitle($category->category);
        SEOMeta::setDescription($category->category);
        SEOMeta::addMeta('category:created_at', $category->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('author', 'Alpet Gexha');

        OpenGraph::setTitle($category->category);
        OpenGraph::setDescription($category->category);
        OpenGraph::setUrl(url()->current());

        // nese kategoria eshte private(0) aborto
        $categorys = Category::findOrFail($category->id);
        if (!$categorys->is_active == 1) {
            abort(404);
        }
        return view('category.single', compact('category'));
    }

    public function showChatId(User $user)
    {
        SEOMeta::setTitle('Chat');
        return view('user.chat', compact('user'));
    }

    public function showChat()
    {
        SEOMeta::setTitle('Chat');
        return view('user.chat');
    }

    public  function showCreatePost()
    {
        SEOMeta::setTitle('Krijimi i Postimit');
        return view('auth.post');
    }

    public function showPostSave(PostSaves $post)
    {
        SEOMeta::setTitle('Postimer i Ruajtura');
        return view('post.save', compact('post'));
    }

    public function showPostLike()
    {
        SEOMeta::setTitle('Postimer i Pelqyera');
        return view('post.like');
    }


    public function showAdminDashboard(User $user, Post $post, Category $category)
    {
        SEOMeta::setTitle('Admin - Dashboard');
        $sessions = DB::table('sessions')->count();
        return view('admin.dashboard.dashboard', compact('user', 'post', 'category', 'sessions'));
    }

    public function showAdminCategory()
    {
        SEOMeta::setTitle('Admin - Kategori');
        return view('admin.category.table');
    }

    public function showAdminPost()
    {
        SEOMeta::setTitle('Admin - Posts');
        return view('admin.post.table');
    }

    public function showAdimRole(User $user)
    {
        SEOMeta::setTitle('Admin - Roles');
        return view('admin.role.table', compact('user'));
    }

    public function showAdminUser(User $user)
    {
        SEOMeta::setTitle('Admin - Users');
        return view('admin.user.table', compact('user'));
    }
}
