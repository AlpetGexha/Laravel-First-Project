<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostCategory;

class SingleSitebar extends Component
{
    public $post_id;
    public function mount($postid)
    {
        $this->post_id = $postid;
        $this->post = Post::where('id', $postid)->get();
    }

    public function render()
    {
        //take 5 post with same category
        $category_id = PostCategory::where('post_id', $this->post_id)->pluck('category_id')->toArray(); //merr idn e kategorive
        // dd($category_id);
        // array_diff($category_id, array(1));

        // $posts = Post::with(['category' => fn ($q) => $q->where('post_id', $this->post_id)->where('category_id', $category_id)])->get();

        $posts = PostCategory::with(['post', 'category'])->where('category_id', $category_id)->where('post_id', '<>', $this->post_id)->get();
        

        // dd($posts);

        // $posts = PostCategory::with(['post', 'category'])->where('post_id', $this->post_id)->where('category_id', $category_id)->get();
        return view('livewire.post.single-sitebar', [
            'posts' => $posts
        ]);
    }
}
