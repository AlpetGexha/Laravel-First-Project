<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class Comments extends Component
{
    public $post,
        $Komenti = [],
        $user_id;

    protected $rules = [
        'Komenti' => '',
    ];

    public function blankFild()
    {
        $this->Komenti = '';
    }

    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->user_id = auth()->user()->id;
        // $this->Komenti = $this->post->comments_id;
    }

    public function store()
    {
        $this->validate();
        Comment::create([
            'body' => $this->Komenti,
            'user_id' => $this->user_id,
            'post_id' =>   $this->post->id,
        ]);
        $this->blankFild();
    }

    public function render()
    {
        return view('livewire.post.comments',[
            'comments' => Comment::where('post_id', $this->post->id)
            ->get()
        ]);
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
