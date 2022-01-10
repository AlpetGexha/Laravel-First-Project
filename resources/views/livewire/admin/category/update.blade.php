<x-modal>
    <x-slot name="id">updateCategory</x-slot>
    <x-slot name="title">Nrysho Kategorin</x-slot>
    <x-slot name="function"> wire:click='update()' </x-slot>
    <x-slot name="type">Ndrysho</x-slot>

    <input type="hidden" wire:model='id'>
    <div class="mb-3">
        <x-jet-label value="{{ __('Kategoria') }}" />
        <x-jet-input class="{{ $errors->has('categoria') ? 'is-invalid' : '' }}" type="text" name="categoria"
            :value="old('categoria')" required autofocus autocomplete="categoria" wire:model.def='categoria' />
        <x-jet-input-error for="categoria"></x-jet-input-error>
    </div>
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">dasdas</button> --}}
