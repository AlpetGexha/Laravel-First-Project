<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $category;
public $search;
    protected $paginationTheme = 'bootstrap';
    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],

    ];


    public function render()
    {
        // $post = ; 
        return view('livewire.post.show', [
            'posts'  => Post::where('title', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}
