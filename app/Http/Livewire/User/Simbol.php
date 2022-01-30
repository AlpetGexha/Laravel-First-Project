<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;


class Simbol extends Component
{
    public $user;

    public $listeners  = ['addComment' => 'render'];

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.user.simbol', [
            'user' => User::where('id', $this->user->id)->get(['id', 'verified'])->first(),
        ]);
    }
}
