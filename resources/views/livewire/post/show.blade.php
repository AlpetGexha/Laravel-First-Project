<div>
    @forelse ($posts as $post)
        Titulli : {{ $post->title }},<br>
        User : {{ $post->user->username }},<br>
        Pershkrimi : {{ Str::limit($post->body, 200, '...') }},<br>
        Categorys <livewire:category.postcategory  :id="$post->id">
            Photo : {{ $post->photo }},<br>
            Likes : {{ $post->likes()->count() }},<br>
            saves : {{ $post->saves()->count() }},<br>
            commnets : {{ $post->comments()->count() }},<br>
            views : {{ $post->views }},<br>
            U krijoa me : {{ $post->created_at->diffForHumans() }},<br>
            <a href="{{ route('post.single', $post) }}">Lexo me shume</a>

        @empty
            <div class="alert alert-info">
                Nuk ka Postime
            </div>
    @endforelse
    {{ $posts->links() }}
</div>
