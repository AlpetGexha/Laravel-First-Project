<?php

namespace App\Http\Livewire\Category;

use App\Models\PostCategory as PC;
use Livewire\Component;

class Postcategory extends Component
{
    public $category;

    public function mount(int $id)
    {
        $this->category = PC::where('post_id', $id)
            ->get();
    }

    public function render()
    {
        return view('livewire.category.postcategory', [
            'category' => $this->category,
        ]);
    }
}
