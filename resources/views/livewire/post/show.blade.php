<div>
    @if ($posts->count() > 0 || $search != '')
        <input wire:model='search' type="search" placeholder="Kerko" class="form-control mb-2">
    @endif
    @forelse ($posts as $post)
        <x-blog-post>
            <x-slot name="title">{{ $post->title }}</x-slot>
            <x-slot name="image">{{ asset('storage/' . $post->photo) }}</x-slot>
            <x-slot name="username">{{ $post->user->username }}</x-slot>
            <x-slot name="created_at">{{ $post->created_at->diffForHumans() }}</x-slot>
            <x-slot name="body"> {{ Str::limit($post->body, 200, '...') }},</x-slot>
            <x-slot name="category">cat</x-slot>
            <x-slot name="views">{{ $post->views }}</x-slot>
            <x-slot name="likes">{{ $post->likes()->count() }}</x-slot>
            <x-slot name="shares">{{ $post->saves()->count() }}</x-slot>
            <x-slot name="comments">{{ $post->comments()->count() }}</x-slot>
            <x-slot name="post_slug">{{ $post->slug }}</x-slot>
        </x-blog-post>
    @empty
        <div class="text-center">
            <span style="color:red;">Nuk ka Postime</span>
        </div>

    @endforelse
    <div class="body-footer d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>

{{-- <livewire:category.postcategory :id="$post->id"> --}}
{{-- @foreach ($post->category as $category)
                            <a style="text-decoration: none;"
                                href="{{ route('category.single', $category->category->slug) }}">
                                <span class="badge badge-sm bg-success">{{ $category->category->category }}</span>
                            </a>
                        @endforeach --}}
