<div class="container-fluid">
    <x-alert />
    @include('livewire.admin.user.delete')
    @include('livewire.admin.user.edit')
    @include('livewire.admin.user.give-roles')
    @include('livewire.admin.user.show')
    @include('livewire.admin.user.user-ban')

    <div class="card shadow">
        <div class="card-header">
            Userat
        </div>

        <div class="card-body">
            <!-- <button wire:click.prevent='unban()'>ban</button> -->
            <div class="col-md-12 mt-1 mb-3">
                <div class="row d-flex">
                    <div class="col-md-2 mt-2">
                        <select wire:model='paginate_page' class="form-control">
                            @foreach ($page_numer as $page)
                                <option value="{{ $page }}">{{ $page }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-7 mt-2">
                        <div class="btn-group d-flex" role="group" aria-label="Basic outlined example">
                            <button wire:click=" sortByStatus" type="button"
                                class="btn {{ is_null($status) ? 'btn-outline-primary' : 'btn-default' }}">
                                <span class="mr-1">Të gjith</span>
                                {{-- <span style="color: red;" class="badge badge-pill badge-info"></span> --}}
                            </button>
                            <button wire:click="sortByStatus('1')" type="button"
                                class="btn {{ $status === '1' ? 'btn-outline-primary' : 'btn-default' }}">
                                <span class="mr-1">Vetëm Të Verifikuarit</span>
                                {{-- <span style="color: red;" class="badge badge-pill badge-primary"></span> --}}
                            </button>
                            <button wire:click.prevent="sortByStatus('false')" type="button"
                                class="btn {{ $status === 'false' ? 'btn-outline-primary' : 'btn-default' }}">
                                <span class="mr-1">Vetëm Jo Të Verifikuarit</span>
                                <span style="color: red;" class="badge badge-pill badge-success"></span>
                            </button>
                        </div>
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
                        <th width='6%' scope="col">Username</th>
                        <th width='6%' scope="col">Email</th>
                        <th width='6%' scope="col">Roles</th>
                        <th width='5%' scope="col">Verifikimin</th>

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
                            <td>{{ $user->isVerified($user) ? 'Verifikuar' : 'Jo Verifikuar' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    {{-- Show --}}
                                    @can('user_show')
                                        <button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#showUser" wire:click.prevent='showUser({{ $user->id }})'>
                                            <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Show"></i>
                                        </button>
                                    @endcan

                                    {{-- Edit --}}
                                    @can('user_edit')
                                        <button type="button" class="btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateCategory" {{-- wire:click.prevent='edit({{ $user->id }})' --}}>
                                            <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Edit"></i>
                                        </button>
                                    @endcan

                                    {{-- Delete --}}
                                    @if (auth()->user()->id !== $user->id)
                                        @can('user_delete')
                                            <button type="submit" class="btn btn-sm  btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#DeleteUser"
                                                onsubmit="return confirm('A jeni i sigurt qe doni ta fshini $user->username pasi ta fshini nuk do te keni mundesi te rivendosni dhe te gjitha postimet mesazhet ndjeksat e tij')"
                                                @if (auth()->user()->id !== $user->id)  wire:click.prevent='showUser({{ $user->id }})' @endif>
                                                <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                            </button>
                                        @endcan
                                    @endif

                                    {{-- Role --}}
                                    @can('user_give_role')
                                        <button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#giveRole" wire:click.prevent='editRole({{ $user->id }})'>
                                            <i class="fas fa-user-tag" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Roles"></i>
                                        </button>
                                    @endcan

                                    @if (is_null($user->banned_till))
                                        {{-- Ban User --}}
                                        @can('user_give_ban')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#banUser"
                                                wire:click.prevent='userBanEdit({{ $user->id }})'>
                                                <i class="fas fa-ban" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Suspendo"></i>
                                            </button>
                                        @endcan
                                    @else
                                        {{-- UnBan User --}}
                                        @can('user_give_unban')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#"
                                                wire:click.prevent='unban({{ $user->id }})'>
                                                <i class="fas fa-ban" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="unban"></i>
                                            </button>
                                        @endcan
                                    @endif

                                    @if ($user->verified == 1)
                                        {{-- Hiq Verifikimin --}}
                                        @can('user_give_verify')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                wire:click.prevent='unverified({{ $user->id }})'>
                                                <i class="fas fa-ban" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Hiq Verifikimin"></i>
                                            </button>
                                        @endcan
                                    @else
                                        {{-- Verifikiko --}}
                                        @can('user_give_verify')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                wire:click.prevent='verified({{ $user->id }})'>
                                                <i class="far fa-check-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Verifikiko"></i>
                                            </button>
                                        @endcan
                                    @endif

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="13">
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