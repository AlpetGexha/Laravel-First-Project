<?php

namespace App\Http\Livewire\User;

use App\Models\Follow;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;

    public function mount($username, User $user)
    {
        $this->user = User::where('username', $username)->first();
    }

    public function follow(int $id)
    {
        //check if user is already following
        $follow = Follow::where('following', auth()->id())->where('user_id', $id)->first();

        if (!$follow) {
            Follow::create([
                'following' => auth()->user()->id,
                'user_id' => $id
            ]);
            session()->flash('success', 'Follow');
        }
    }

    public function unFollow(int $id)
    {
        $unFollow = Follow::where('following', auth()->user()->id)->where('user_id', $id);

        $unFollow->delete();
        session()->flash('success', 'UnFollow');
    }
    public function render()
    {
        return view('livewire.user.show', [
            'user' => $this->user,
        ]);
    }
}
