<div>
    <h1> {{ $commnet_count }} {{ $commnet_count == 1 ? 'Koment' : 'Komente' }}</h1>
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
                <x-jet-button wire:loading.attr='disabled' wire:click.prevent='addCommnet()'>
                    {{ __('Komento') }}
                </x-jet-button>
            </div>
        </div>
    </form>


    @forelse ($comments as $comment)

        {{-- <form action="">
        Reaply <input type="text" wire:model='Repley'>
        <button wire:click.prevent='addReply({{ $comment->id }})'> Reply</button>
    </form>
    <h5>Replay</h5>
    @foreach ($replies as $replie)
    {{$replie->body}} <br>
    @endforeach --}}

        <div class="card bg-light mb-1">
            <div class="card-body">
                <!-- Single comment-->
                <div class="d-flex">
                    <div class="flex-shrink-0"><img class="rounded-circle"
                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..."></div>
                    <div class="ms-3">
                        <div class="fw-bold">{{ $comment->user->username }}</div>
                        <p>{{ $comment->body }}</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <span class="text-muted text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <span class="text-center"> Nuk ka komente! Behu komentuesi i parë </span>
    @endforelse
    <div class="d-flex justify-content-center mb-4 ">
        <div>
            @if ($comments->total() > 0 && $comments->count() < $comments->total())
                <button class="btn btn-outline-success btn-sm" wire:click.prevent='loadMore()'>
                    Shiko më shumë Komente
                </button>
            @endif

            @if ($comments->count() >= 12)
                <button class="btn btn-outline-success  btn-sm" wire:click.prevent='loadLess()'>
                    Shiko më pak Komente
                </button>
            @endif
        </div>
    </div>
</div>
