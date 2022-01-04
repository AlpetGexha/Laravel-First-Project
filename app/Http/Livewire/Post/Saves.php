<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\PostSaves;
use App\Models\Post;
use Livewire\WithPagination;

class Saves extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.post.saves', [
            'post'  => PostSaves::where('user_id', auth()->user()->id)->paginate(1),
        ]);
    }
}
