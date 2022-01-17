<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use App\Traits\WithSorting;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryTable extends Component
{
    use WithPagination, WithSorting, AuthorizesRequests;

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
        $this->authorize('category_edit');
        $Category = Category::where('id', $id)->first();
        $this->ids = $Category->id;
        $this->categoria = $Category->category;
        $this->created_at = $Category->created_at;
    }

    public function update()
    {
        $this->authorize('category_edit');
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
        $this->authorize('category_delete');
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
