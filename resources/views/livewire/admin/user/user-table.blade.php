<div class="container-fluid">
    @include('livewire.admin.user.delete')
    @include('livewire.admin.user.edit')
    @include('livewire.admin.user.give-roles')
    @include('livewire.admin.user.show')
    <div class="card shadow">
        <div class="card-header">
            Userat
        </div>
        <div class="card-body">
            <div class="col-md-12 mt-1 mb-3">
                <div class="row d-flex">
                    <div class="col-md-2 mt-2">
                        <select wire:model='paginate_page' class="form-select">
                            @foreach ($page_numer as $page)
                                <option value="{{ $page }}">{{ $page }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="search" placeholder="kerko" class="form-control" wire:model='search'>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-striped table-responsive table-bordered shadow-sm text-center">
                <thead>
                    <tr>
                        <th width='3%' scope="col">#
                            <span wire:click='sortBy("id")' class="text-sm" style="cursor: pointer">
                                <i
                                    class="fa fa-arrow-up {{ $sortBy === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i
                                    class="fa fa-arrow-down {{ $sortBy === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th width='3%' scope="col">Statusi</th>
                        <th width='5%' scope="col">Emri</th>
                        <th width='5%' scope="col">Mbiemri</th>
                        <th width='6%' scope="col">Username
                            <span wire:click='sortBy("username")' class="text-sm" style="cursor: pointer">
                                <i
                                    class="fa fa-arrow-up {{ $sortBy === 'username' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i
                                    class="fa fa-arrow-down {{ $sortBy === 'username' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span>
                        </th>
                        <th width='6%' scope="col">Email</th>
                        <th width='6%' scope="col">Roles</th>

                        <th width='1%' scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                            </th>
                            <td>
                                @if (Cache::has('user-is-online-' . $user->id))
                                    <span class="badge badge-success">Online</span>
                                @else
                                    <span class="badge badge-danger">Offline</span>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mbiemri }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>

                                @forelse ($user->getRoleNames() as $role)
                                    <span class="badge badge-sm bg-success">{{ $role }}</span>
                                @empty
                                    User Normal
                                @endforelse
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    {{-- Edit --}}
                                    @can('user_edit')
                                        <button type="button" class="btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateCategory" {{-- wire:click.prevent='edit({{ $categorie->id }})' --}}>
                                            <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Edit"></i>
                                        </button>
                                    @endcan
                                    {{-- Delete --}}
                                    @can('user_delete')
                                        <button type="button" class="btn btn-sm  btn-outline-primary" {{-- wire:click.prevent='delete({{ $categorie->id }})' --}}>
                                            <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete"></i>
                                        </button>
                                    @endcan

                                    {{-- Show --}}
                                    @can('user_show')
                                        <button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#showUser" wire:click.prevent='showUser({{ $user->id }})'>
                                            <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Show"></i>
                                        </button>
                                    @endcan

                                    {{-- Role --}}
                                    @can('user_give_role')
                                        <button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#giveRole" wire:click.prevent='editRole({{ $user->id }})'>
                                            <i class="fas fa-user-tag" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Roles"></i>
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
            {{ $users->links() }}
        </div>
    </div>
</div>
