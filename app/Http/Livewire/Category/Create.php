<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\RateLimiter;

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
    /**
     * E ruan Kategorin
     *  */
    public function store()
    {
        $executed = RateLimiter::attempt(
            'make-categoty:' . auth()->user()->id,
            $perMinute = 2,
            function () {
                $this->validate();
                if (Category::create([
                    'category' => Str::ucfirst($this->category),
                    'slug' => Str::slug($this->category, '-'),
                ])) {
                    session()->flash('success', 'Kateogira u krijua me Sukses');
                    $this->blankFild();
                    $this->emitUp('addCategorysss');
                }
            }
        );
        if (!$executed) {
            $seconds = RateLimiter::availableIn('make-categoty:' . auth()->user()->id);
            session()->flash('success', 'U lutem prisni ' . $seconds . ' sekonda para se krijoni kategori te re');
        }
    }

    /** RealTime Validate */
    public function Updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {

        return view('livewire.category.create');
    }
}
