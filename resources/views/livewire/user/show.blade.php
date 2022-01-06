<div>
    id: {{ $user->id }} <br>
    Postime {{ $user->post()->count() }} <br>
    Ndjekje {{ $user->followers()->count() }} <br>
    Ndjekës <br>
    Emri : {{ $user->emri }} <br>
    mbiemri : {{ $user->mbiemri }}<br>
    username : {{ $user->username }}<br>
    email : {{ $user->email }}<br>
    created_at : {{ strftime('%e %B, %Y', strtotime($user->created_at)) }}<br>
    <img src="{{ $user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">



    <br>
    {{-- @if (auth()->user()->id == $user->id)
    Edit
    @elseif ($user->is_follow())
    <button wire:click="unFollow({{$user->id}})" type="submit"><i class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
    @else
    <button wire:click="follow({{$user->id}})" type="submit"><i class="far fa-thumbs-up pr-3"></i>Follow</button>
    @endif --}}

    {{-- {{ $user->followers()->user_id }} --}}
    @if (auth()->check() && auth()->user()->id != $user->id)
        @if (!$user->isFollowing(Auth::user()))
            <button wire:click.prevent="follow({{ $user->id }})" type="submit"><i
                    class="far fa-thumbs-up pr-3"></i>Follow</button>
        @else
            <button wire:click.prevent="unFollow({{ $user->id }})" type="submit"><i
                    class="fas fa-thumbs-up pr-3"></i>UnFollow</button>
        @endif
    @endif

    @if (auth()->check() && auth()->user()->id == $user->id)
        Edit
    @endif


    <h1>Post</h1>
    @forelse ($user->post as $post)

        <h1>Titulli : {{ $post->title }}</h1>
        User : <a href="{{ route('user.show', $post->user->username) }}">{{ $post->user->username }}</a>,<br>
        Pershkrimi : {{ $post->body }},<br>
        Categorys : <livewire:category.postcategory :id="$post->id">,<br>

            Photo : <img src="{{ url('storage/app/' . $post->photo) }}" alt="" /> ,<br>
            saves : {{ $post->saves()->count() }},<br>
            Likes : {{ $post->likes()->count() }},<br>
            comments : {{ $post->comments()->count() }},<br>
            views : {{ $post->views }},<br>
            U krijoa me : {{ $post->created_at->diffForHumans() }},<br>

            @if (auth()->check())

                @if (!$post->isLikedByUser(Auth::user()))
                    <button wire:click.prevent="like({{ $post->id }})" type="button"><i
                            class="far fa-thumbs-up pr-3"></i>Like</button>
                @else
                    <button wire:click.prevent="unLike({{ $post->id }})" type="button"><i
                            class="fas fa-thumbs-up pr-3"></i>UnLike</button>
                @endif

                @if (!$post->isSavedByUser(Auth::user()))
                    <button wire:click="save({{ $post->id }})" type="submit"><i
                            class="far fa-thumbs-up pr-3"></i>Save</button>
                @else
                    <button wire:click="unSave({{ $post->id }})" type="submit"><i
                            class="fas fa-thumbs-up pr-3"></i>UnSave</button>
                @endif

                @if (auth()->check() && auth()->user()->id == $user->id)
                    <button>Ndrysho</button> <button>Fshije</button>
                @endif

            @endif

        @empty
            Nuk ka postime
    @endforelse
</div>
