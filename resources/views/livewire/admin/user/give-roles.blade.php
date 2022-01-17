<x-modal>
    <x-slot name="id">giveRole</x-slot>
    <x-slot name="title">Jep Rolin</x-slot>
    <x-slot name="function">wire:click.prevent='updateRole()'</x-slot>
    <x-slot name="type">Jep Rolet</x-slot>

    <div class="mb-3">

        @foreach ($roles as $role)
            <input class="form-check-input" type="checkbox" value="{{ $role->id }}"
                wire:model='selectRoles' id="flexCheckDefault">
            <span class="badge badge-sm bg-success">{{ $role->name }}</span><br>
        @endforeach
    </div>


</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateRole">dasdas</button> --}}
