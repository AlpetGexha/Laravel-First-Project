<?php

namespace App\Http\Livewire\Post;

use App\Models\Post as Posts;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;
use phpDocumentor\Reflection\Types\This;

class Post extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $Titulli, $Teksti, $Foto, $ViewCount;

    protected $rules = [
        'Titulli' => 'required|min:3|max:255',
        'Teksti' => 'required|min:3',
        'Foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public function blankFild()
    {
        $this->Titulli = '';
        $this->Teksti = '';
        $this->Foto = '';
    }


    public function store()
    {
        $this->validate();
        Posts::create([
            'title' => $this->Titulli,
            'body' => $this->Teksti,
            'photo' => $this->Foto->storeAs('img/posts', $this->Foto->hashName()),
            'user_id' => auth()->user()->id,
            'category_id' => 1,
        ]);
        session()->flash('success', 'Postimi u krijua me Sukses');
        $this->blankFild();
        $this->emit('addPost');
    }


    public function Updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.post.post');
    }
}
