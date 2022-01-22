<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use  App\Traits\WithMoreLess;

class Showall extends Component
{
    use WithMoreLess;

    public function render()
    {
        return view('livewire.category.showall', [
            'categories' => Category::where('is_active', 1)
                ->orderBy('id', 'desc')
                ->paginate($this->per_page_moreless)
        ]);
    }
}
