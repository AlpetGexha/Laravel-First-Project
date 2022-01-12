<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class PostTable extends Component
{
    use WithPagination, WithSorting;

    public $search;

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    public function delete($id)
    {
        Post::where('id', $id)->first()->delete();
        session()->flash('success', 'Potimi u fshie me sukses');
    }

    public function render()
    {
        return view('livewire.admin.post.post-table', [
            'posts' => Post::where('title', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
                //count all reply for post
        ]);
    }
}
