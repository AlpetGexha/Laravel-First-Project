<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use App\Traits\WithSorting;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination, WithSorting;

    public $search;

    public $ids, $categoria, $created_at; //Category info

    public $rules = [
        'categoria' => 'min:3|max:255'
    ];

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];

    /**
     * Pastro te thenat
     */
    public function blankField()
    {
        $this->ids = '';
        $this->categoria = '';
    }

    /**
     * Jep vlerat aktuale
     */
    public function edit($id)
    {
        $Category = Category::where('id', $id)->first();
        $this->ids = $Category->id;
        $this->categoria = $Category->category;
        $this->created_at = $Category->created_at;
    }

    public function update()
    {
        $this->validate();
        if ($this->ids) {
            $Category = Category::find($this->ids);
            $Category->update([
                'category' => Str::title($this->categoria),
            ]);
            session()->flash('success', 'Kategoria u editua me Sukses');
            $this->emit('updateCategory');
        }
    }

    public function delete($id)
    {
        Category::where('id', $id)->first()->delete();
        session()->flash('success', 'Kategoria u fshie me sukses');
    }


    public function updated($value)
    {
        $this->validateOnly($value);
    }

    public function render()
    {
        return view('livewire.admin.category.category-table', [
            'categories' => Category::where('category', 'like', '%' . $this->search . '%')
             ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),   
        ]);
    }
}
