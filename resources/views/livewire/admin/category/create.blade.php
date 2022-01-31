<x-modal>
    <x-slot name="id">createAdminCategory</x-slot>
    <x-slot name="title">Krijo Kategori të re</x-slot>
    <x-slot name="function">wire:click='create()' </x-slot>
    <x-slot name="type">Krijo</x-slot>

    {{-- <input type="hidden" wire:model='id'> --}}
    <div class="mb-3">
        <x-alert />
        <x-jet-label value="{{ __('Kategoria') }}" />
        <x-jet-input class="{{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category"
            :value="old('category')" required autofocus autocomplete="category" wire:model.defer='category' />
        <x-jet-input-error for="category"></x-jet-input-error>
    </div>
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">dasdas</button> --}}
