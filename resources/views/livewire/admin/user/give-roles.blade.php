<x-modal>
    <x-slot name="id">giveRole</x-slot>
    <x-slot name="title">Jep Rolin</x-slot>
    <x-slot name="function">wire:click.prevent='updateRole()'</x-slot>
    <x-slot name="type">Jep Rolet</x-slot>

    <div class="mb-3">
        <div class="row">
            @forelse ($roles as $role)
                <div class="col-md-4 ">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" wire:model.defer='selectRoles'
                            id="customSwitch{{ $role->id }}" value="{{ $role->id }}">
                        <label class="custom-control-label"
                            for="customSwitch{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                </div>
            @empty
                Nuk ka role
            @endforelse
        </div>
        @error('SPError') <strong style="color: var(--danger)">{{ $message }}</strong> @enderror
    </div>

</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateRole">dasdas</button> --}}
<script>
    window.livewire.on('updateRole', () => { //emit
        $('#giveRole').modal('hide');
    });
</script>
