<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Showall extends Component
{

    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.category.showall', [
            'categories' => $this->categories
        ]);
    }
}
