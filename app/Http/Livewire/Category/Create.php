<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{

    public $Kateogira;

    protected $rules = [
        'Kateogira' => 'required|min:3|max:255',
    ];
    public function blankFild()
    {
        $this->Kateogira = '';
    }

    public function store()
    {
        Category::create([
            'category' => $this->Kateogira,
        ]);
        session()->flash('success', 'Kateogira u krijua me Sukses');
        $this->validate();
        $this->blankFild();
        $this->emit('addCategory');
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
