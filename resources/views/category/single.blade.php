<x-base>
    <x-slot name="header">
        {{ __('Kategoria') }} / {{ __($category->category) }}
    </x-slot>

    <h1> {{ __($category->category) }}</h1>
    {{-- <livewire:post.show :id="$category->id"> --}}
    <livewire:post.show-other :categoryid="$category->id">
        {{-- <livewire:post.show :categoryid="$category->id"> --}}
        {{-- <livewire:post.show> --}}

</x-base>
