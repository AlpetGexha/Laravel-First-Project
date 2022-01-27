<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $post, $search;
    public $userid, $categoryid, $paginate = 10;
    protected $paginationTheme = 'bootstrap';

    public function mount(int $userid = null, int $categoryid = null)
    {
        $this->userid = $userid;
        $this->categoryid = $categoryid;
    }

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    /** Restarto faqen pasi ben search */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {


        if ($this->userid != null) {
            $post = Post::with([
                'user' => fn ($q) => $q->select('id', 'username'),
                'likes' => fn ($q) => $q->select('post_id'),
                'saves' => fn ($q) => $q->select('post_id'),
                'comments' => fn ($q) => $q->select('post_id'),
            ])
                ->withCount(['likes', 'saves', 'comments'])
                ->select('id', 'title', 'body', 'photo', 'slug', 'created_at', 'user_id', 'views')
                ->where('user_id', $this->userid)
                ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } else if ($this->categoryid != null) {
            $post = PostCategory::where('category_id', $this->categoryid)
                ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } else {
            $post = Post::with([
                'user' => fn ($q) => $q->select('id', 'username'),
                'likes' => fn ($q) => $q->select('post_id'),
                'saves' => fn ($q) => $q->select('post_id'),
                'comments' => fn ($q) => $q->select('post_id'),
            ])
                ->withCount(['likes', 'saves', 'comments'])
                ->select('id', 'title', 'body', 'photo', 'slug', 'created_at', 'user_id', 'views')
                ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);

            foreach ($post as $p) {
                $p->likes_count = $p->likes->count();
                $p->saves_count = $p->saves->count();
                $p->comments_count = $p->comments->count();
            }
            // $posts = Post::withCount('comments')->get();

            // foreach ($posts as $post) {
            //     dd($post->comments_count);
            // }
        }

        return view('livewire.post.show', [
            'posts' =>  $post,
        ]);
    }
}
