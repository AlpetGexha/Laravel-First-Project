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
        $this->status = Follow::where('following', $user->id)->first();
    }

    public function follow(int $id)
    {
        //chekc if user has already followed
        //make followers systeam
        $follow = Follow::where('user_id', auth()->user()->id)->where('following', $id)->first();
        if (!$follow) {
            Follow::create([
                'user_id' => auth()->user()->id,
                'following' => $id
            ]);
            session()->flash('success', 'Follow');
        }
    }

    public function unFollow(int $id)
    {
        $unFollow = Follow::where('user_id', auth()->user()->id)->where('following', $id);

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
