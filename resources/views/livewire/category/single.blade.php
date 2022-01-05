<div>
    <h1> {{ $category->category }}</h1>

    @forelse ($posts as $post)
        Titulli : {{ $post->post->title }},<br>
        User : {{ $post->post->user->username }},<br>
        Pershkrimi : {{ Str::limit($post->post->body, 200, '...') }},<br>
        Categorys <livewire:category.postcategory :id="$post->post->id">
            Photo : {{ $post->post->photo }},<br>
            Likes : {{ $post->post->likes()->count() }},<br>
            saves : {{ $post->post->saves()->count() }},<br>
            commnets : {{ $post->post->comments()->count() }},<br>
            views : {{ $post->post->views }},<br>
            U krijoa me : {{ $post->post->created_at->diffForHumans() }},<br>
            <a href="{{ route('post.single', $post->post) }}">Lexo me shume</a>

            @empty Nuk ka postime me kete kategori @endforelse
</div>
