<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostLikes;
use App\Models\PostSaves;

class Single extends Component
{
    public  $post, $post_like = false, $post_save = false;


    public function mount(int $id)
    {
        $this->post = Post::where('id', $id)->first();
    }

    public function increment()
    {
        // dd('increment');

    }
    public function like(int $id)
    {
        // dd(PostLikes::class);
        PostLikes::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ]);

        session()->flash('success', 'Ju e pelqyet');
        $this->post_like = true;
    }

    public function unLike(int $id)
    {
        $like = PostLikes::where('post_id', $id)->where('user_id', auth()->user()->id);

        $like->delete();
        session()->flash('success', 'Ju e unlike');
        $this->post_like = false;
    }

    public function save(int $id)
    {
        PostSaves::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ]);

        session()->flash('success', 'Ju e ruajt');
        $this->post_save = true;
    }

    public function unSave(int $id)
    {
        $save = PostSaves::where('post_id', $id)->where('user_id', auth()->user()->id);

        $save->delete();
        session()->flash('success', 'Ju e unSave');
        $this->post_save = false;
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
