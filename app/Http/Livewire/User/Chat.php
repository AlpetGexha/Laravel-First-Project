<?php

namespace App\Http\Livewire\User;

use App\Models\Conversation;
use App\Models\Follow;
use App\Models\Messages;
use Livewire\Component;

class Chat extends Component
{

    public $mesazhi;

    public $selectedConversation;
    public $rules = ['mesazhi' => 'required'];

    public function mount()
    {
        $this->selectedConversation = Follow::query()
            ->where('user_id', auth()->id())
            ->orWhere('following', auth()->id())
            ->first();
    }

    public function sendMessage()
    {
        $this->validate();
        Messages::create([
            'follow_id' => $this->selectedConversation->id,
            'user_id' => auth()->id(),
            'body' => $this->mesazhi
        ]);

        $this->reset('mesazhi');

        $this->viewMessage($this->selectedConversation->id);
    }

    public function viewMessage($conversationId)
    {
        $this->selectedConversation = Follow::findOrFail($conversationId);
    }
    public function render()
    {
        $conversations = Follow::query()
            ->where('user_id', auth()->id())
            ->orWhere('following', auth()->id())
            ->get();
        return view('livewire.user.chat', [
            'conversations' => $conversations
        ]);
    }
}
