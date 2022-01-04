<div>
    <h1>Titulli : {{ $post->title }}</h1>
    User : {{ $post->user->username }},<br>
    Pershkrimi : {{ $post->body }},<br>
    Category : {{ $post->category_id }},<br>
    Photo : <img src="{{ url('storage/app/'.$post->photo) }}" alt="" /> ,<br>
    saves : {{ $post->saves }},<br>
    Likes : {{ $post->likes()->count() }},<br>
    comments : {{ $post->comments()->count() }},<br>
    views : {{ $post->views }},<br>
    U krijoa me : {{ $post->created_at->diffForHumans() }},<br>

    @if($post_like == false)
        <button wire:click="like({{$post->id}})" type="submit"><i class="far fa-thumbs-up pr-3"></i>Like</button>
    @else
        <button wire:click="unLike({{$post->id}})" type="submit"><i class="fas fa-thumbs-up pr-3"></i>UnLike</button>
    @endif
</div>