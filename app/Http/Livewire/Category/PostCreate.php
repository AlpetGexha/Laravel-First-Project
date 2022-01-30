<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class PostCreate extends Component
{
    protected $listeners = ['addCategorysss' => 'render'];

    public function render()
    {
        return view('livewire.category.post-create', [
            'categorys' => Category::select(['id', 'category','is_active','slug'])
                ->where('is_active', 1)
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
