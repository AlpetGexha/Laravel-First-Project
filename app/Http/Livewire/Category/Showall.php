<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Showall extends Component
{
public  $per_page = 10;

public function loadMore()
{
    $this->per_page += 10;
}

public function loadLess()
{
    $this->per_page -= 10;
}


    public function render()
    {
        return view('livewire.category.showall', [
            'categories' => Category::paginate($this->per_page),
        ]);
    }
}
