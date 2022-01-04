<?php

namespace App\Http\Livewire\User;

use App\Models\Follow;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user, $follow = false;

    public function mount($username, User $user)
    {
        $this->user = User::where('username', $username)->first();
        $this->status = Follow::where('following', $user->id)->first();
    }

    public function follow(int $id)
    {
        Follow::create([
            //duhet mi ndru
            'user_id' => $id,
            'following' => auth()->user()->id,
        ]);

        session()->flash('success', 'Follow');
        $this->follow = true;
    }

    public function unFollow(int $id)
    {
        $unFollow = Follow::where('following', auth()->user()->id)->where('user_id', $id);

        $unFollow->delete();
        session()->flash('success', 'UnFollow');
        $this->follow = false;
    }
    public function render()
    {
        return view('livewire.user.show', [
            'user' => $this->user,
        ]);
    }
}
