<x-base>
    <x-slot name="header">
        {{ __('Posti') }} / {{ __($post->title) }}
    </x-slot>

    {{-- Postimi --}}
    <livewire:post.single :id="$post->id" />

    {{-- Komentet --}}
    <livewire:post.comments :id="$post->id" />
    {{-- <x-slot name="postid">{{ $post->id }}</x-slot> --}}
    <x-slot name="singlePostSiteBar">
            <h4>
                <strong> {{ __('Përdoruesit shikojn edhe') }}</strong>
            </h4>
            <livewire:post.single-sitebar :postid="$post->id" />
        {{-- livewire\post\single-sitebar --}}
    </x-slot>

</x-base>
