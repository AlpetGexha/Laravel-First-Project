<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostLikes;

class Single extends Component
{
    public  $post, $post_like = false;


    public function mount($id)
    {
        $this->post = Post::where('id', $id)->first();
    }

    public function increment()
    {
        // dd('increment');

    }
    public function like($id)
    {
        // dd(PostLikes::class);
        PostLikes::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ]);

        session()->flash('success', 'Ju e pelqyet');
        $this->post_like = true;
    }

    public function unLike($id)
    {
        $like = PostLikes::where('post_id', $id)->where('user_id', auth()->user()->id);
        $like->delete();

        session()->flash('success', 'Ju e unlike');
        $this->post_like = false;
    }

    public function render()
    {
        return view(
            'livewire.post.single',
            [
                'post' => $this->post,
            ]
        );
    }
}
