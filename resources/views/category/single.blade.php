<x-base>
    <x-slot name="header">
        {{ __('Kategoria') }} / {{ __($category->category) }}
    </x-slot>


    {{-- <livewire:post.show :id="$category->id"> --}}
        <livewire:category.single :id="$category->id">
    {{-- <livewire:post.show> --}}

</x-base>
