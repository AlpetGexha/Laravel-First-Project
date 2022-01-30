<div class="mt-3 card shadow p-2 bg-light">

    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <h1> {{ $commnets_count }} {{ $commnets_count == 1 ? 'Koment' : 'Komente' }}</h1>
    <x-alert />
    <form action="{{ route('login') }}">
        {{-- Komenti --}}
        <div class="mb-3 p-1">
            <x-jet-label value="{{ __('Komentoni këtu') }}" />

            <x-textarea class="{{ $errors->has('Komenti') ? 'is-invalid' : '' }}" type="text" wire:model='Komenti'
                name="Komenti" required />
            <x-jet-input-error for="Komenti"></x-jet-input-error>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">

                <form action="{{ route('login') }}" method="POST">
                    <x-jet-button wire:click.prevent='addCommnet()'>
                        {{ __('Komento') }}
                    </x-jet-button>
                </form>

            </div>
        </div>
    </form>

    {{-- comment --}}
    @forelse ($comments as $comment)
        <div class="card bg-light mb-1">
            <div class="card-body">
                {{-- check this user post --}}
                {{-- Delete edit button --}}
                {{-- @auth
                    @if ($comment->user_id == auth()->user()->id)
                        <div x-data="{ open: false }">
                            <button @click="open = ! open">Edit</button>
                            <div x-show="open" @click.outside="open = false">
                                <input type="text">
                                <button>Edit</button>
                            </div>
                        </div>
                    @endif
                @endauth --}}
                {{-- Dropdown për delete, edit --}}
                @auth
                    @if ($comment->post->user_id == auth()->user()->id || $comment->user_id == auth()->user()->id)
                        <div class="d-flex justify-content-end">
                            <div class="nav-item dropdown">
                                <i class="fas fa-ellipsis-v" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false"> </i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    {{-- Delete Commnet --}}
                                    <button class="dropdown-item" wire:click.prevent='deleteCommnet({{ $comment->id }})'>
                                        <p style="color:red"> Fshije</p>
                                    </button>
                                    </li>
                                    @if ($comment->user_id == auth()->user()->id)
                                        <div x-data="{ open: false }">
                                            <button class="dropdown-item" @click="open = ! open">Ndrysho</button>
                                            <div x-show="open" @click.outside="open = false">
                                                <input type="text">
                                                <button>Edit</button>
                                                {{-- <input wire:model='Komenti' type="text">
                                <button wire:click.prevent='editComment({{ $comment->id }})'>Edit</button> --}}
                                            </div>
                                        </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    @endif
                @endauth

                {{-- Foto Username --}}
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="rounded-circle" src="{{ $comment->user->profile_photo_url }}"
                            style="width: 50px; height:50px;" alt="{{ $comment->user->username }}">
                    </div>
                    {{-- Komenti --}}
                    <div class="ms-3">
                        <div class="fw-bold">{{ $comment->user->username }}</div>
                        <p>{{ $comment->body }}</p>
                    </div>
                </div>

                {{-- Reply button --}}
                @auth
                    <div class="col-md-6" style="margin-left: 5rem;" x-data="{ open: false }">
                        <button class="btn btn-sm btn-outline-success" wire:click='blankFildRepley()'
                            @click="open = ! open">Përgjigju</button>
                        <div wire:click.prevent='blankFildRepley()' x-show="open" @click.outside="open = false">
                            <form action="" class="input-group mb-1 mt-1">
                                <input class="form-control" type="text" wire:model='Repley'>
                                <button class="btn btn-sm btn-outline-dark" type='submit'
                                    wire:click.prevent="addReply({{ $comment->id }})">Përgjigju</button>
                            </form>
                        </div>
                    </div>
                @endauth

                {{-- Reply --}}
                @foreach ($comment->replies as $reply)
                    {{-- Dropdown for delete Replys --}}
                    @auth
                        @if ($comment->post->user_id == auth()->user()->id || $comment->user_id == auth()->user()->id)
                            <div class="d-flex justify-content-end">
                                <div class="nav-item dropdown">
                                    <i class="fas fa-ellipsis-v" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false"> </i>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        {{-- Delete Commnet --}}

                                        <button class="dropdown-item" style="color:red;"
                                            wire:click.prevent='deleteReply({{ $reply->id }})'>Fshije</button>
                                        @if ($comment->user_id == auth()->user()->id)
                                            <div x-data="{ open: false }">
                                                <button class="dropdown-item" @click="open = ! open">Edit</button>
                                                <div x-show="open" @click.outside="open = false">
                                                    <input type="text">
                                                    <button>Edit</button>
                                                    {{-- <input wire:model='Komenti' type="text">
                                                <button wire:click.prevent='editComment({{ $comment->id }})'>Edit</button> --}}
                                                </div>
                                            </div>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <div class="d-flex mt-4 ms-5">
                        <div class="flex-shrink-0">
                            <img class="rounded-circle" style="width: 50px; height:50px;"
                                src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->username }}">
                        </div>

                        <div class="ms-3">
                            <div class="fw-bold">{{ $reply->user->username }}</div>
                            <p>{{ $reply->body }}</p>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="d-flex justify-content-end">
                    <span class="ms-3">*</span>
                    <span class="text-muted text-sm ms-3"> {{ $comment->created_at->diffForHumans() }}</span>
                </div> --}}
            </div>
        </div>
    @empty
        <span class="text-center"> Nuk ka komente! Behu komentuesi i parë </span>
    @endforelse
    <div class="d-flex justify-content-center mb-4 ">
        <div>
            @if ($comments->total() > 0 && $comments->count() < $comments->total())
                <button class="btn btn-outline-success btn-sm" wire:click.prevent='showMore()'>
                    Shiko më shumë Komente
                </button>
            @endif

            @if ($comments->count() >= 8)
                <button class="btn btn-outline-success  btn-sm" wire:click.prevent='showLess()'>
                    Shiko më pak Komente
                </button>
            @endif
        </div>
    </div>
</div>
