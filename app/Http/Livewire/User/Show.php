<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount($username)
    {
        $this->user = User::where('username', $username)->first();
    }

    public function render()
    {
        return view('livewire.user.show', [
            'user' => $this->user,
        ]);
    }
}
