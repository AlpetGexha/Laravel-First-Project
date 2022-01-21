<div class="container" wire:poll>
    <div class="pt-2 row">
        <div class="col-md-4">
            <div class="card shadow-sm ">
                <div class="card-header">
                    <h3 class="card-title">Lista</h3>
                </div>
                <div class="card-body ">
                    @forelse ($conversations as $conversation)
                        <a href="#" wire:click.prevent="viewMessage( {{ $conversation->id }})">
                            <div class="inbox_chat">
                                <div
                                    class="chat_list {{ $conversation->id === $selectedConversation->id ? 'active_chat' : '' }} ">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img class="rounded-circle"
                                                src="{{ $conversation->user->profile_photo_url }}" alt="sunil">
                                        </div>
                                        <div class="chat_ib">
                                            <h5>{{ $conversation->user->name }} {{ $conversation->user->mbiemri }}
                                                <span
                                                    class="chat_date">{{ $conversation->messages->last()?->created_at->diffForHumans() }}</span>
                                            </h5>
                                            <p>{{ Str::limit($conversation->messages->last()?->body, 10, '...') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <span style="color:red text-center text-center">Nuk ka rezultat</span>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Bisedë me
                        <span>
                            @if ($selectedConversation) {{ $selectedConversation->user->username }} @endif
                        </span>
                    </h3>
                </div>

                <div class="card-body ">
                    <div class="msg_history">
                        @if ($selectedConversation)
                            @forelse ($selectedConversation->messages as $message)
                                <div class="incoming_msg">
                                    <div
                                        class="  {{ $message->user_id === auth()->id() ? 'received_msg' : 'sent_msg' }}">
                                        <div
                                            class=" {{ $message->user_id === auth()->id() ? 'received_withd_msg' : 'sent_msg' }}">
                                            <p>{{ $message->body }}</p>
                                            <span class="time_date">
                                                {{ $message->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span style="color:red text-center">Nuk ka bised! Shkruaj i pari!!!</span>
                            @endforelse
                        @endif
                    </div>



                </div>
                <div class="card-footer">
                    <form wire:submit.prevent="sendMessage" action="#">
                        <div class="input-group">
                            <input wire:model.defer="mesazhi" type="text" placeholder="Shkruja mesazhin ..."
                                class="form-control">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary">Dergo</button>
                            </span>
                        </div>

                        @error('mesazhi')
                            <strong class="text-center"
                                style="margin-top: 0.25rem; font-size: 0.875em; color: #e3342f;">{{ $message }}</strong>
                        @enderror
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<style>
    .container {
        max-width: 1170px;
        margin: auto;
    }

    img {
        max-width: 100%;
    }

</style>
