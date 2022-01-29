<x-modal>
    <x-slot name="id">creatRole</x-slot>
    <x-slot name="title">Krijo Role</x-slot>
    <x-slot name="function"> wire:click.prevent='store()'</x-slot>
    <x-slot name="type">Krijo</x-slot>

    <div class="mb-3">
        <x-jet-label value="{{ __('Role') }}" />
        <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
            :value="old('name')" required autofocus autocomplete="name" wire:model.defer='name' />

        <x-jet-input-error for="name"></x-jet-input-error>
    </div>

    {{-- <div class="form-group form-floating mb-3">
        <input type="text" class="form-control" name="username" value="" placeholder="Username" required="required"
            autofocus="">
        <label for="floatingName">Email or Username</label>
    </div> --}}

    <div class="col-md-12">
        <div class="form-group">
            <label>Permission</label>
            <div wire:ignore>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-md-4">
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
            @error('role')
                {{ $message }}
            @enderror
        </div>
    </div>
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#creatRole">dasdas</button> --}}
