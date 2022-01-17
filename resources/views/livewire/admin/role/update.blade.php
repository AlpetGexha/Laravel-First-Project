<x-modal>
    <x-slot name="id">updateRole</x-slot>
    <x-slot name="title">Ndrysho Rolin</x-slot>
    <x-slot name="function">wire:click.prevent='update()'</x-slot>
    <x-slot name="type">Ndrysho</x-slot>

    <div class="mb-3">
        <x-jet-label value="{{ __('Roli') }}" />
        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
            :value="old('name')" required autofocus autocomplete="name" wire:model.def='name' />
        <x-jet-input-error for="name"></x-jet-input-error>
    </div>


    {{-- show user --}}
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateRole">dasdas</button> --}}
