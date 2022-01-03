<div>
    <h4>Count : {{ $commnet_count }}</h4>

    @forelse ($comments as $comment)
    {{$comment->id}}
    Commenti : {{$comment->body}} <br>
    Post_id : {{ $comment->post_id }} <br>
    User : {{ $comment->user->username }} <br>
    {{-- <form action="">
        Reaply <input type="text" wire:model='Repley'>
        <button wire:click.prevent='addReply({{ $comment->id }})'> Reply</button>
    </form>
    <h5>Replay</h5>
    @foreach ($replies as $replie)
    {{$replie->body}} <br>
    @endforeach --}}

    <br><br>
    @empty
    Nuk ka kommnete behu kommentuesi i pare
    @endforelse
    <form action="">
        {{-- Title --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Comment') }}" />

            <x-jet-input class="{{ $errors->has('Komenti') ? 'is-invalid' : '' }}" type="text" wire:model='Komenti'
                name="Komenti" required />
            <x-jet-input-error for="Komenti"></x-jet-input-error>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <x-jet-button wire:click.prevent='addCommnet()'>
                    {{ __('Komento') }}
                </x-jet-button>
            </div>
        </div>
    </form>

</div>