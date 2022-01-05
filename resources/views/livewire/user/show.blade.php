<div>
    id: {{ $user->id }} <br>
    Postime <br>
    Ndjekje {{ $user->followers()->count() }} <br>
    Ndjekës <br>
    Emri : {{ $user->emri }} <br>
    mbiemri : {{ $user->mbiemri }}<br>
    username : {{ $user->username }}<br>
    email : {{ $user->email }}<br>
    created_at : {{ $user->created_at->diffForHumans() }}<br>
    profile_photo_path : {{ $user->profile_photo_path }}<br>


    {{-- @if (auth()->user()->id == $user->id)
    Edit
    @elseif ($user->is_follow())
    <button wire:click="unFollow({{$user->id}})" type="submit"><i class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
    @else
    <button wire:click="follow({{$user->id}})" type="submit"><i class="far fa-thumbs-up pr-3"></i>Follow</button>
    @endif --}}

    {{-- {{ $user->followers()->user_id }} --}}
    @if (auth()->check() && auth()->user()->id != $user->id)
        @if ($user->isFollowing(Auth::user()))
            <button wire:click="follow({{ $user->id }})" type="submit"><i
                    class="far fa-thumbs-up pr-3"></i>Follow</button>
        @else
            <button wire:click="unFollow({{ $user->id }})" type="submit"><i
                    class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
        @endif
    @endif

    @if (auth()->check() && auth()->user()->id == $user->id)
        Edit
    @endif
</div>
