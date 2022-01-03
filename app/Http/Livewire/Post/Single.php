<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class Single extends Component
{
    public  $post;
    public function mount($id)
    {
        $this->post = Post::where('id', $id)->first();
    }
    public function render()
    {
        return view('livewire.post.single',);
    }
}
