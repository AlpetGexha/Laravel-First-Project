<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $category;

    public function render()
    {
        // $post = ; 
        return view('livewire.post.show', [
            'posts'  => Post::paginate(1),
        ]);
    }
}
