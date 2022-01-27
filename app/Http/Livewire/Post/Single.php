<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostLikes;
use App\Models\PostSaves;


class Single extends Component
{

    public  $post, $category;
    /**
     * @param  post_id $id
     */
    public function mount(int $id)
    {
        $this->post = Post::where('id', $id)->first();
    }

    /**
     * E ben like postimin
     *
     * @param  int  $id
     */
    public function like(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // dd(PostLikes::class);
        //check if user has already liked the post
        $like = PostLikes::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
        if (!$like) {
            PostLikes::create([
                'user_id' => auth()->user()->id,
                'post_id' => $id
            ]);
        }
        session()->flash('success', 'Ju e pelqyet');
    }

    /**
     * E heq like e postimit
     *
     * @param  int  $id
     */
    public function unLike(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $like = PostLikes::where('post_id', $id)->where('user_id', auth()->user()->id);

        $like->delete();
        session()->flash('success', 'Ju e unlike');
        $this->post_like = false;
    }

    /**
     * E ben save postimin
     *
     * @param  int  $id
     */
    public function save(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        //check if user has already saved the post
        $save = PostSaves::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
        if (!$save) {
            PostSaves::create([
                'user_id' => auth()->user()->id,
                'post_id' => $id
            ]);
        }

        session()->flash('success', 'Ju e ruajt');
        $this->post_save = true;
    }

    /**
     * E heq savin e postimin
     *
     * @param  int  $id
     */

    public function unSave(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

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
