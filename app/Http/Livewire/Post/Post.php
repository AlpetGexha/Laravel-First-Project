<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post as Posts;
use App\Models\PostCategory;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Post extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public Post $post;
    public $Titulli;
    public $Teksti;
    public $Foto;
    public $ViewCount;
    public $category = [];
    public $Kategoria = [];

    protected $rules = [
        'Titulli' => 'required|min:3|max:255',
        'Teksti' => 'required|min:3',
        'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'required',
    ];


    public function mount($category_id = null)
    {
        if (is_null($category_id)) {
            $this->Kategoria = Category::where('id', $category_id)->get();
        } else {
            $this->Kategoria = Category::all();
        }
    }
    public function blankFild()
    {
        $this->Titulli = '';
        $this->Teksti = '';
        $this->Foto = '';
        $this->Kategoria = [];
        $this->Tags = '';
        $this->category = [];
    }

    public function store()
    {
        $this->validate();
        Posts::create([
            'title' => $this->Titulli,
            'body' => $this->Teksti,
            'photo' => $this->Foto->storeAs('img/posts', $this->Foto->hashName()),
            // 'category' => json_encode($this->category),
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($this->Titulli, '-'),
        ]);
        // Per Kateqorinat
        foreach ($this->category as $category) {
            PostCategory::create([
                'post_id' => Posts::latest()->first()->id,
                'category_id' => $category,
            ]);
        }

        // PostCategory::create([
        //     'post_id' => Posts::latest()->first()->id,
        //     'category_id' => $this->Kategoria,
        // ]);
        session()->flash('success', 'Postimi u krijua me Sukses');
        $this->blankFild();
        // $this->emit('addPost');
        $this->emit('addPosts');
    }

    public function Updated($field)
    {
        $this->validateOnly($field);
    }


    public function render()
    {
        return view('livewire.post.post', [
            'categories' => $this->Kategoria
        ]);
    }
}
