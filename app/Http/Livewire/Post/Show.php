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
        if ($this->userid || $this->categoryid  == null) {
        }

        if ($this->userid != null) {
            $post = Post::where('user_id', $this->userid)
                // ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } elseif ($this->categoryid != null) {
            $post = PostCategory::where('category_id', $this->categoryid)
                // ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } else {
            $post = Post::where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        }

        return view('livewire.post.show', [
            'posts' =>  $post,
        ]);
    }
}
