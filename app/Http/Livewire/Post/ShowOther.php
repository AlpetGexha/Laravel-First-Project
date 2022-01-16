<?php

namespace App\Http\Livewire\Post;

use App\Models\PostCategory;
use App\Models\PostLikes;
use App\Models\PostSaves;
use Livewire\Component;

class ShowOther extends Component
{
    public $category, $post, $saveid, $categoryid, $likeid, $paginate = 10;
    /**
     * @param  post_id $id
     */
    public function mount(int $categoryid = null, int $saveid = null, $likeid = null)
    {
        $this->categoryid = $categoryid;
        $this->saveid = $saveid;
        $this->likeid = $likeid;
    }

    public function render()
    {
        if ($this->categoryid != null) {
            $post = PostCategory::where('category_id', $this->categoryid)
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } elseif ($this->saveid != null) {
            $post = PostSaves::where('user_id', $this->saveid)
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } elseif ($this->likeid != null) {
            $post = PostLikes::where('user_id', $this->likeid)
                ->orderBy('id', 'desc')
                ->paginate($this->paginate);
        } else {
            $post = PostCategory::orderBy('id', 'desc')
                ->paginate($this->paginate);
        }

        return view('livewire.post.show-other', [
            'posts' => $post,
        ]);
    }
}
