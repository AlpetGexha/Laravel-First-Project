<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    public $post, $search;
    protected $paginationTheme = 'bootstrap';

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    /** Restarto faqen pasi ben search */
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.post.show', [
            'posts' =>  Post::where('title', 'like', '%' . $this->search . '%')
                ->orderBy('id', 'desc')
                ->paginate(2),
        ]);
    }
}
