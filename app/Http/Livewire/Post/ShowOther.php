<?php

namespace App\Http\Livewire\Post;

use App\Models\PostCategory;
use App\Models\PostLikes;
use App\Models\PostSaves;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting;

class ShowOther extends Component
{
    use WithPagination, WithSorting;
    public $category, $post, $saveid, $categoryid, $likeid, $paginate = 10, $search;

    /**
     * @param  post_id $id
     * @param  category_id $id
     * @param  likeid $id
     */
    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    public function mount(int $categoryid = null, int $saveid = null, $likeid = null)
    {
        $this->categoryid = $categoryid;
        $this->saveid = $saveid;
        $this->likeid = $likeid;
    }


    public function render()
    {
        if ($this->categoryid != null) {
            $post = PostCategory::query()
                ->where('category_id', $this->categoryid)
                ->with([
                    'category' => fn ($q) => $q->select('category', 'slug', 'id', 'is_active'),
                    'post' => fn ($q) => $q->select('id', 'title', 'slug','body', 'photo', 'user_id', 'created_at', 'views')->with('user', 'likes', 'saves', 'comments')->withCount(['likes', 'saves', 'comments'])
                ])
                ->select('post_id', 'category_id')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate_page);
        } elseif ($this->saveid != null) {
            $post = PostSaves::query()
                ->where('user_id', $this->saveid)
                ->with([
                    'user' => fn ($q) => $q->select('id', 'username'),
                    'post' => fn ($q) => $q->select('id', 'title', 'body', 'photo', 'user_id', 'created_at', 'views')->with('user', 'likes', 'saves', 'comments')->withCount(['likes', 'saves', 'comments'])
                ])
                ->select('post_id', 'user_id', 'id')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate_page);
        } elseif ($this->likeid != null) {
            $post = PostLikes::query()
                ->where('user_id', $this->likeid)
                ->with([
                    'user' => fn ($q) => $q->select('id', 'username'),
                    'post' => fn ($q) => $q->select('id', 'title', 'body', 'photo', 'user_id', 'created_at', 'views')->with('user', 'likes', 'saves', 'comments')->withCount(['likes', 'saves', 'comments'])
                ])
                // ->select('id','user_id ', 'post_id')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate_page);
        } else {
            $post = PostCategory::orderBy('id', 'desc')
                ->paginate($this->paginate_page);
        }
        foreach ($post as $p) {
            $p->likes_count = $p->post->likes->count();
            $p->saves_count = $p->post->saves->count();
            $p->comments_count = $p->post->comments->count();
        }
        return view('livewire.post.show-other', [
            'posts' => $post,
        ]);
    }
}
