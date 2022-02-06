<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Models\Category;
use App\Models\SubCategory;

use Livewire\Component;
use Livewire\WithPagination;

use App\Traits\WithSorting;
use App\Traits\WithCheckbox;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SubCategoryTable extends Component
{
    use WithSorting, WithCheckbox, WithPagination, AuthorizesRequests;

    public $search, $status = null;
    public $ids, $subcategory, $category;
    // public $subcategory_all = [];
    public $SubCategoryNumberSelect = 1; //numri i kolona i selektuar
    public $SubCategoryNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; //numri i kolonave 

    public $queryString = [
        'page' => ['except' => 1],
        'search' => ['except' => '', 'as' => 'q'],
    ];
    public $rules = [
        'subcategory' => 'required|min:3|max:255|unique:sub_categories',
    ];

    public function blankField()
    {
        $this->ids = '';
        $this->subcategory = '';
        $this->category = '';
    }

    /**
     * Jep vlerat aktuale
     */
    public function edit(int $id)
    {
        $this->authorize('category_edit');
        $Category = SubCategory::where('id', $id)->first();
        $this->ids = $Category->id;
        $this->categoria = $Category->category->category;
        $this->subcategory = $Category->subcategory;
    }

    public function update()
    {
        $this->authorize('category_edit');
        $this->validate([
            'subcategory' => 'required|min:3|max:255',
        ]);
        if ($this->ids) {
            $Category = SubCategory::find($this->ids);
            $Category->update([
                'subcategory' => Str::title($this->subcategory),
                'slug' => Str::slug($this->subcategory),
                'category_id' => $this->getCategoryId($this->categoria),
            ]);
            session()->flash('success', 'Nën Kategoria u editua me Sukses');
            $this->emit('updateSubCategory');
        }
    }


    /**
     * get categories id 
     * 
     * @param String $category
     */

    public function getCategoryId($category)
    {
        $category = Category::where('category', $category)->first();
        return $category->id;
    }

    /**
     * Fshije Nënkategorin
     * 
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->authorize('category_delete');
        SubCategory::where('id', $id)->first()->delete();
        session()->flash('success', 'Nën Kategoria u fshie me sukses');
    }

    /**
     * Beje publike Kategorin
     * 
     * @param int $id
     */
    public function active(int $id)
    {
        $this->authorize('category_accept');
        $Categorys = SubCategory::findOrFail($id);
        $Categorys->is_active = 1;
        $Categorys->save();
        session()->flash('success', 'Nën Kategoria u publikua me sukses');
    }

    /**
     * Beje private Kategorin
     * 
     * @param int $id
     */
    public function unactive(int $id)
    {
        $this->authorize('category_access');
        $Categorys = SubCategory::findOrFail($id);
        $Categorys->is_active = 0;
        $Categorys->save();
        session()->flash('success', 'Nën Kategoria nuk është publike tani');
    }

    /**
     * Krijo Sub Category
     */
    public function createSubCategory()
    {
        $this->validate([
            'subcategory' => 'required|min:3|max:255',
        ]);

        //nese eshte i zbrazet jep vleren e fundit
        if ($this->category == null) {
            $this->category = $this->getLastIdCategory();
        }

        SubCategory::create([
            'subcategory' => $this->subcategory,
            'slug' => Str::slug($this->subcategory),
            'category_id' => $this->getIdFromName($this->category),
            'is_active' => 1,
        ]);
        $this->blankField();
        session()->flash('success', 'Nën Kategoria u krijua me sukses');
    }

    //get id category from name
    public function getIdFromName(String $name)
    {
        $category = Category::where('category', $name)->first();
        return $category->id;
    }

    public function updated($value)
    {
        $this->validateOnly($value);
        $this->setModel(SubCategory::class, 'subcategory', 'is_active');
    }

    public function render()
    {
        return view('livewire.admin.subcategory.sub-category-table', [
            'subcategories' => SubCategory::query()
                ->where('subcategory', 'like', '%' . $this->search . '%')
                ->with(['category' => fn ($q) => $q->select('id', 'category')])
                ->when($this->status, fn ($q) => $q->where('is_active', $this->status))
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->paginate_page), with('category'),
            'categorys' => Category::where('is_active', 1)
                ->select('id', 'category', 'is_active')
                ->get(),
        ]);
    }
}
