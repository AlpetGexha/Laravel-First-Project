<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\RateLimiter;

class Comments extends Component
{
    public $post,
        $Komenti = [],
        $editKommeti = [],
        $user_id,
        // $Repley = [],
        // $comment_id,
        $per_page = 7;

    protected $rules = [
        'Komenti' => 'required|min:3|max:1000',
        // 'Repley' => 'required|min:3',
    ];

    public function blankFild()
    {
        $this->Komenti = '';
        // $this->Repley = '';
    }

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function addCommnet()
    {
        $executed = RateLimiter::attempt(
            'make-comment:' . auth()->user()->id,
            $perMinute = 2,
            function () {
                $this->validate();
                Comment::create([
                    'body' => $this->Komenti,
                    'user_id' => auth()->user()->id,
                    'post_id' =>   $this->post->id,
                ]);
                $this->blankFild();
            }
        );
        if (!$executed) {
            $seconds = RateLimiter::availableIn('make-comment:' . auth()->user()->id);
            session()->flash('success', 'U lutem prisni ' . $seconds . ' sekonda para se komentoni perseris');
        }
    }


    public function deleteCommnet($id)
    {
        //check if the user is the owner of the comment
        if (($this->post->user_id == auth()->user()->id) || (auth()->user()->id == $this->post->comments->where('id', $id)->first()->user_id)) {
            $this->post->comments()->where('id', $id)->delete();
        }
    }
    public  function editComment($id)
    {
        if (auth()->user()->id == $this->post->user_id) {
            $this->post->comments()->where('id', $id)->update(['body' => $this->Komenti]);
            $this->blankFild();
        }
    }

    public function updateCommnet($id)
    {
        $commnet = $this->post->comments()->where('id', $id)->first();
        $this->Komenti = $commnet->body;
    }
    /*
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
*/

    public function loadMore()
    {
        $this->per_page += 5;
    }

    public function loadLess()
    {
        $this->per_page -= 5;
    }

    public function render()
    {
        return view('livewire.post.comments', [
            'comments' => Comment::where('post_id', $this->post->id)
                ->orderBy('id', 'desc')
                ->paginate($this->per_page),
            // 'replies' => CommentReply::where('comment_id',)->get(),
            ''
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
