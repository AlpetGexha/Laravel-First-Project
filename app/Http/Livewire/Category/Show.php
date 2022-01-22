<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use  App\Models\Category;

class Show extends Component
{
    public function render()
    {
        return view('livewire.category.show', [
            'categories' => Category::where('is_active', 1)
                ->select('id', 'category','is_active')
                ->orderBy('id', 'desc')
                ->get(),
        ]);
    }
}
