<?php

namespace App\Http\Livewire\Admin\Category;

// use App\Interface\WithCheckboxInterface;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\WithSorting;
use App\Traits\WithCheckbox;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//implements WithCheckboxInterface
class CategoryTable extends Component
{
    use WithPagination, WithSorting, WithCheckbox, AuthorizesRequests;

    public $search;
    public $ids, $categoria, $created_at, $name, $category; //Category info
    public  $status = null;
    public $subcategory;
    // public $subcategory_all = [];
    public $SubCategoryNumberSelect = 1; //numri i kolona i selektuar
    public $SubCategoryNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; //numri i kolonave 

    public $rules = [
        'categoria' => 'min:3|max:255',
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
        $this->subcategory = [];
    }

    /**
     * Krijo nje kategori
     */

    public function create()
    {
        $this->validate([
            'category' => 'required|min:3|max:255|unique:categories',
        ]);

        Category::create([
            'category' => $this->category,
            'slug' => Str::slug($this->category),
            'is_active' => 1,
        ]);
        $this->category = '';
        session()->flash('success', 'Kategoria u krijua me sukses');
    }

    /**
     * Jep vlerat aktuale
     */
    public function edit(int $id)
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

    public function delete(int $id)
    {
        $this->authorize('category_delete');
        Category::where('id', $id)->first()->delete();
        session()->flash('success', 'Kategoria u fshie me sukses');
    }

    /**
     * Beje publike Kategorin
     * 
     * @param int $id
     */
    public function active(int $id)
    {
        $this->authorize('category_accept');
        $Categorys = Category::findOrFail($id);
        $Categorys->is_active = 1;
        $Categorys->save();
        session()->flash('success', 'Kategoria u publikua me sukses');
    }

    /**
     * Beje private Kategorin
     * 
     * @param int $id
     */
    public function unactive(int $id)
    {
        $this->authorize('category_access');
        $Categorys = Category::findOrFail($id);
        $Categorys->is_active = 0;
        $Categorys->save();
        session()->flash('success', 'Kategoria nuk është publike tani');
    }

    /**
     * Krijo Sub Category
     */
    public function createSubCategory()
    {
        $this->validate([
            'subcategory' => 'required|min:3|max:255|unique:sub_categories',
        ]);

        //nese eshte i zbrazet jep vleren e fundit
        if ($this->categoria == null) {
            $this->categoria = $this->getLastIdCategory();
        }

        SubCategory::create([
            'subcategory' => $this->subcategory,
            'slug' => Str::slug($this->subcategory),
            'category_id' => $this->getIdCategory($this->categoria),
            'is_active' => 1,
        ]);
        $this->blankField();
        session()->flash('success', 'Nën Kategoria u krijua me sukses');
    }

    /**
     * get id category from name
     * 
     * @param string $name
     */

    public function getIdCategory(String $name)
    {
        $category = Category::where('category', $name)->first();
        return $category->id;
    }


    public function getLastIdCategory()
    {
        $category = Category::orderBy('id', 'desc')->first();
        return $category->category;
    }

    public function updated($value)
    {
        $this->validateOnly($value);
        $this->setModel(Category::class, 'category', 'is_active');
    }

    public function render()
    {
        return view('livewire.admin.category.category-table', [
            'categories' => Category::where('category', 'like', '%' . $this->search . '%')
                ->when($this->status, fn ($query, $status) => $query->where('is_active', $this->status))
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page),
            'subcategories' => Category::orderBy('id', 'desc')->get(['id', 'category', 'is_active']),
        ]);
    }
}
