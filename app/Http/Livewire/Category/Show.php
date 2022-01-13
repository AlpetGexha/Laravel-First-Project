<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use  App\Models\Category;

class Show extends Component
{
    public function render()
    {
        return view('livewire.category.show', [
            'categories' => Category::select('id', 'category')->get(),
        ]);
    }
}
