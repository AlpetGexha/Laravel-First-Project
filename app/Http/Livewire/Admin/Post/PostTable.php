<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Traits\WithCheckbox;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PostTable extends Component
{
    use WithPagination, WithSorting, WithCheckbox, AuthorizesRequests;

    public $search;

    public $ids, $title, $userid, $body, $views,  $likes, $saves, $comments, $photo, $categorit, $created_at; //Post info

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    public function delete($id)
    {
        $this->authorize('post_delete');
        $post = Post::findOrFail($id);
        $path = 'storage/' . $post->photo;
        $post->delete();
        if (file_exists($path)) {
            unlink($path);
        }

        session()->flash('success', 'Potimi u fshie me sukses');
    }

    public function updated()
    {
        $this->setModel(Post::class, 'title');
    }

    public function edit(int $id)
    {
        $this->authorize('post_show');
        $post = Post::where('id', $id)->first();
        $this->ids = $post->id;
        $this->photo = $post->photo;
        $this->title = $post->title;
        $this->userid  = $post->user->username;
        $this->body = $post->body;
        $this->categorit = $post->category;
        $this->views = $post->views;
        $this->comments = $post->comments()->count();
        $this->likes = $post->likes()->count();
        $this->saves = $post->saves()->count();
        $this->created_at = $post->created_at;
    }
    public function render()
    {
        return view('livewire.admin.post.post-table', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
        ]);
    }
}
