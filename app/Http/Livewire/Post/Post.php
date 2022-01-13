<?php

namespace App\Http\Livewire\Post;

use App\Models\Category;
use App\Models\Post as Posts;
use App\Models\PostCategory;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Post extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public Post $post;
    public $Titulli,  $Teksti, $Foto,  $Kategoria = [], //Kategoria e Postit
        $category = []; //Selektimi i kategorive

    /** Validate */
    protected $rules = [
        'Titulli' => 'required|min:3|max:255',
        'Teksti' => 'required|min:3',
        'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'required',
    ];

    public function mount()
    {
        $this->Kategoria = Category::all();
    }

    /** I  fshin te dhenat ne input */
    public function blankFild()
    {
        $this->Titulli = '';
        $this->Teksti = '';
        $this->Foto = '';
        $this->Kategoria = [];
        $this->Tags = '';
        $this->category = [];
    }

    /**
     * E Shton postimin
     */

    public function store()
    {
        $posting = RateLimiter::attempt(
            'make-post:' . auth()->user()->id,
            $perMinute = 2,
            function () {
                $this->validate();
                Posts::create([
                    'title' => Str::title($this->Titulli),
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
                session()->flash('success', 'Postimi u krijua me Sukses');
                $this->blankFild();
                $this->emit('addPosts');
            }
        );
        if (!$posting) {
            $seconds = RateLimiter::availableIn('make-post:' . auth()->user()->id);
            session()->flash('success', 'U lutem prisni ' . $seconds . ' sekonda para se krijoni postim të ri');
        }
    }

    /** LiveTime Validate  */
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
