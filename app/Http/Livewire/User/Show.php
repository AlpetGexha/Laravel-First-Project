<?php

namespace App\Http\Livewire\User;

use App\Models\Follow;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $selectedConversation;
    public function mount($username)
    {
        $this->user = User::where('username', $username)->first();
        $this->selectedConversation = Follow::query()
            ->where('user_id', auth()->id())
            ->orWhere('following', auth()->id())
            ->first();
    }

    public function follow(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $follow = Follow::where('following', auth()->user()->id)->where('user_id', $id)->first();
        if (!$follow) {
            Follow::create([
                'following' => auth()->user()->id,
                'user_id' => $id,
                'chat_id' => md5(auth()->user()->id) . md5($id),
            ]);
            session()->flash('success', 'Follow');
        }
    }

    //show followoing for this user



    public function unFollow(int $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $unFollow = Follow::where('following', auth()->user()->id)->where('user_id', $id);

        $unFollow->delete();
        session()->flash('success', 'UnFollow');
    }
    public function render()
    {
        return view('livewire.user.show', [
            'user' => $this->user,
            'follows' => Follow::where('following', $this->user->id)->get(),
            'followings' => Follow::where('user_id', $this->user->id)->get(),
        ]);
    }
}
