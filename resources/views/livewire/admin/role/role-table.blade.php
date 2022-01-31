<div class="container-fluid">
    <x-alert />
    @include('livewire.admin.role.create')
    @include('livewire.admin.role.update')
    <div class="card shadow">
        <div class="card-header">

            <div class="col-md-12 mt-1 mb-1">
                <div class="row d-flex">
                    <div class="col-md-2 mt-2">
                        Rolet
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                @can('role_create')
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#creatRole">
                                        Krijo Role
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">
            @include('components.checkboxtable')
            <div class="col-md-12 mt-1 mb-3">
                <div class="row d-flex">
                    <div class="col-md-2 mt-2">
                        <select wire:model='paginate_page' class="form-control">
                            @foreach ($page_numer as $page)
                                <option value="{{ $page }}">{{ $page }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <input type="search" placeholder="kerko" class="form-control" wire:model='search'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-striped table-responsive table-bordered shadow-sm">
                <thead wire:loading.class='text-muted'>
                    <tr>
                        <th width='1%' scope="col">
                            <input class="" wire:model='selectPage' type="checkbox" id="flexCheckDefault">
                        </th>

                        <th width='8%' scope="col">#
                            <span wire:click='sortBy("id")' class="text-sm" style="cursor: pointer">
                                <i
                                    class="fa fa-arrow-up {{ $sortBy === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i
                                    class="fa fa-arrow-down {{ $sortBy === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th width='13%' scope="col">Role
                            <span wire:click='sortBy("name")' class="text-sm" style="cursor: pointer">
                                <i
                                    class="fa fa-arrow-up {{ $sortBy === 'category' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i
                                    class="fa fa-arrow-down {{ $sortBy === 'category' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>

                        <th scope="col">Premission</th>

                        <th width='8%' scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>
                                <input class="" wire:model='selectIteams' value="{{ $role->id }}"
                                    type="checkbox" id="flexCheckDefault">
                            </td>
                            <th scope="row">
                                {{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}
                            </th>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $role_permission)
                                    <span class="badge badge-sm bg-success">{{ $role_permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    {{-- Edit --}}
                                    @can('role_edit')
                                        <button type="button" class="btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateRole" wire:click.prevent='edit({{ $role->id }})'>
                                            <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Edit"></i>
                                        </button>
                                    @endcan
                                    {{-- Delete --}}
                                    @can('role_delete')
                                        <button type="button" class="btn btn-sm  btn-outline-primary"
                                            wire:click.prevent='delete({{ $role->id }})'>
                                            <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="5">
                                Nuk ka resultat
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="body-footer d-flex justify-content-end">
            {{ $roles->links() }}
        </div>
    </div>
</div>
