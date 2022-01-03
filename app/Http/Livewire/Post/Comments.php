<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentReply;

class Comments extends Component
{
    public $post,
        $Komenti = [],
        $user_id,
        $Repley = [],
        $comment_id,
        $commnet_count;

    protected $rules = [
        'Komenti' => 'required|min:3',
        'Repley' => 'required|min:3',
    ];

    public function blankFild()
    {
        $this->Komenti = '';
        $this->Repley = '';
    }

    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->user_id = auth()->user()->id;
        $this->commnet_count = Comment::where('post_id', $this->post->id)->count();
    }

    public function addCommnet()
    {
        $this->validate();
        Comment::create([
            'body' => $this->Komenti,
            'user_id' => $this->user_id,
            'post_id' =>   $this->post->id,
        ]);
        $this->blankFild();
    }

    public function addReply($ids)
    {
        $this->validate();
        CommentReply::create([
            'comment_id' => $ids,
            'user_id' => $this->user_id,
            'body' => $this->Repley,
        ]);
        $this->blankFild();
    }

    public function render()
    {
        return view('livewire.post.comments', [
            'comments' => Comment::where('post_id', $this->post->id)
                
            ->get(),
                // 'replies' => CommentReply::where('comment_id',)->get(),
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
