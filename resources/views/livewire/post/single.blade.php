<div>
    Titulli : {{ $post->title }},<br>
    User : {{ $post->user->username }},<br>
    Pershkrimi : {{ $post->body }},<br>
    Category : {{ $post->categorys->category }},<br>
    Photo : {{ $post->photo }},<br>
    likes : {{ $post->likes }},<br>
    saves : {{ $post->saves }},<br>
    commnets : {{ $post->commnets }},<br>
    views : {{ $post->views }},<br>
    views : {{ $post->views }},<br>
    U krijoa me : {{ $post->created_at->diffForHumans() }},<br>
</div>