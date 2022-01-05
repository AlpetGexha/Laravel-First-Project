<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use  App\Models\Category;

class Show extends Component
{

    public $category;

    protected $rules = ['category' => 'required'];

    public function mount()
    {
        $this->category = Category::all();
    }

    public function render()
    {
        return view('livewire.category.show', [
            'categories' => $this->category
        ]);
    }
}
