<div>
    @if ($posts->count() > 0 || $search != '')
        <input wire:model='search' type="search" placeholder="Kerko" class="form-control mb-2">
    @endif
    {{-- <h1> {{ $category->category }}</h1> --}}
    @forelse ($posts as $post)
        <x-blog-post>
            <x-slot name="title">{{ $post->post->title }}</x-slot>
            <x-slot name="image">{{ asset('storage/' . $post->post->photo) }}</x-slot>
            <x-slot name="username">{{ $post->post->user->username }}</x-slot>
            <x-slot name="created_at">{{ $post->post->created_at->diffForHumans() }}</x-slot>
            <x-slot name="body"> {{ Str::limit($post->post->body, 200, '...') }},</x-slot>
            <x-slot name="category">cat</x-slot>
            <x-slot name="views">{{ $post->post->views }}</x-slot>
            <x-slot name="likes">{{ $post->post->likes_count }}</x-slot>
            <x-slot name="shares">{{ $post->post->saves_count }}</x-slot>
            <x-slot name="comments">{{ $post->post->comments_count }}</x-slot>
            <x-slot name="post_slug">{{ $post->post->slug }}</x-slot>
        </x-blog-post>
    @empty
        <span class="d-flex justify-content-center" style="color:red">
            Nuk ka postime
        </span>
    @endforelse
    <div class="body-footer d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>
