<div>
    <h1> {{ $category->category }}</h1>

    @forelse ($posts as $post)
        <x-blog-post>
            <x-slot name="title">{{ $post->post->title }}</x-slot>
            <x-slot name="username">{{ $post->post->user->username }}</x-slot>
            <x-slot name="created_at">{{ $post->post->created_at->diffForHumans() }}</x-slot>
            <x-slot name="body"> {{ Str::limit($post->post->body, 200, '...') }},</x-slot>
            <x-slot name="category">cat</x-slot>
            <x-slot name="views">{{ $post->post->views }}</x-slot>
            <x-slot name="likes">{{ $post->post->likes()->count() }}</x-slot>
            <x-slot name="shares">{{ $post->post->saves()->count() }}</x-slot>
            <x-slot name="comments">{{ $post->post->comments()->count() }}</x-slot>
            <x-slot name="post_slug">{{ $post->post->slug }}</x-slot>
        </x-blog-post>
    @empty
        <span class="text-center" style="color:red">
            Nuk ka postime me kete kategori
        </span>
    @endforelse
</div>
