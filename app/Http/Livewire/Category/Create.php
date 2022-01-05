<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{

    public $category;

    protected $rules = [
        'category' => 'required|min:3|max:255|unique:categories',
    ];
    public function blankFild()
    {
        $this->category = '';
    }

    public function store()
    {
        $this->validate();
        if (Category::create([
            'category' => $this->category,
            'slug' => Str::slug($this->category, '-'),
        ])) {
            session()->flash('success', 'Kateogira u krijua me Sukses');
            $this->blankFild();
            $this->emit('refreshAll');
        }
    }


    public function Updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {

        return view('livewire.category.create');
    }
}
