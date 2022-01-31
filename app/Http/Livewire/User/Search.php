<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $user_search;
    public function render()
    {
        return view('livewire.user.search', [
            'user_results' => User::select('id', 'username', 'profile_photo_path','name')
                ->where('username', 'like', '%' . $this->user_search . '%')
                ->limit(8)
                ->get()
        ]);
    }
}
