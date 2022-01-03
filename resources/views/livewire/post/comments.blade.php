<div>
    @forelse ($comments as $comment)
    Commenti : {{$comment->body}} <br>
    Post_id : {{ $comment->post_id }} <br>
    User : {{ $comment->user->username }} <br> <br>

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
                <x-jet-button wire:click.prevent='store()'>
                    {{ __('Posto') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>