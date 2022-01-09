<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\PostCategory;


class Single extends Component
{

    public $category, $post;
    /**
     * @param  post_id $id
     */
    public function mount(int $id)
    {
        $this->category = Category::find($id);
        $this->post = PostCategory::where('category_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.category.single', [
            'category' => $this->category,
            'posts' => $this->post,
        ]);
    }
}
