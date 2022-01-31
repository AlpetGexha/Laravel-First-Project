<x-modal>
    <x-slot name="id">updateRole</x-slot>
    <x-slot name="title">Ndrysho Rolin</x-slot>
    <x-slot name="function">wire:click.prevent='update()'</x-slot>
    <x-slot name="type">Ndrysho</x-slot>

    <div class="mb-3">
        <x-alert />
        <x-jet-label value="{{ __('Roli') }}" />
        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
            :value="old('name')" required autofocus autocomplete="name" wire:model.def='name' />
        <x-jet-input-error for="name"></x-jet-input-error>
        {{-- {{ $errors = $this->getErrorBag() }} --}}
        @error('SPError') <strong style="color: var(--danger)">{{ $message }}</strong> @enderror
    </div>
    <div class="mb-3">

        <div class="row" wire:loading.class='text-muted'>
            {{-- @dd($premissions_per_role) --}}
            @foreach ($permissions as $permission)
                <div class="col-md-4 ">
                    {{-- @dd($permission->name) --}}
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" wire:model.defer='premissions_per_role'
                            id="customSwitch{{ $permission->id }}" value="{{ $permission->id }}">
                        <label class="custom-control-label"
                            for="customSwitch{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- show user --}}
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateRole">dasdas</button> --}}
