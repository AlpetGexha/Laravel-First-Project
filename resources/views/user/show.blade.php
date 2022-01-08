<x-app-layout>
    <x-slot name="header">
        {{ __('Perdoruesi') }} / {{ __($user->username) }}
    </x-slot>

    <livewire:user.show :username="$user->username" />

    {{-- <livewire:post.show :userid="$user->id"> --}}

</x-app-layout>
