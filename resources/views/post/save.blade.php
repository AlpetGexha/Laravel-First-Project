<x-base>
    <x-slot name="header">
        {{ __('Postimet e Ruajtura') }}
    </x-slot>

    <livewire:post.show-other :saveid="auth()->id()">
</x-base>
