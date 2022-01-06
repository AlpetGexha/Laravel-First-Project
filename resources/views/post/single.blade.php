<x-base>
    <x-slot name="header">
        {{ __('Ballina') }} / {{ __($post->title) }}
    </x-slot>

    {{-- Postimi --}}
    <livewire:post.single :id="$post->id" />

    {{-- Komentet --}}
    <livewire:post.comments :id="$post->id" />


</x-base>
