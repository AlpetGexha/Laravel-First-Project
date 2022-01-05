<div>
    <h1>Titulli : {{ $post->title }}</h1>
    User : {{ $post->user->username }},<br>
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

    @endif
</div>
