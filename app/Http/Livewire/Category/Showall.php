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
        $categorys = Category::withCount('category')
            ->select('id', 'category', 'slug')
            ->where('is_active', 1)
            ->orderBy('id', 'desc')
            ->paginate($this->per_page_moreless);

        return view('livewire.category.showall', [
            'categories' => $categorys,
            'categories_count' => Category::with('category', 'post')->where('is_active', 1)->count(),
            // 'post_count' => Category::with('post','category')->where('is_active', 1)->count(),
        ]);
    }
}
