<x-app-layout>
    <x-slot name="header">
        Krijo Postime
    </x-slot>
    {{-- Postime --}}
    <x-jet-authentication-card>
        <x-slot name="logo"> </x-slot>
        <livewire:post.post>
    </x-jet-authentication-card>

    {{-- Kategori --}}
    <x-jet-authentication-card>
        <x-slot name="logo"></x-slot>
        <livewire:category.create>
    </x-jet-authentication-card>
</x-app-layout>