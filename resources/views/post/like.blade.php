<x-base>
    <x-slot name="header">
        {{ __('Postimet e pëlqyera') }}
    </x-slot>

    <livewire:post.show-other :likeid="auth()->id()">

</x-base>
