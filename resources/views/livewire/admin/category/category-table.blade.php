<div class="container-fluid">
    <x-alert />
    @include('livewire.admin.category.update')
    @include('livewire.admin.category.create')

    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex bd-highlight">
                <div class="mr-auto bd-highlight"> Kategorit</div>
                <button class="bd-highlight btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#createAdminCategory">Krijo Kategori</button>
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
                    <div class="col-md-7 mt-2">
                        <div class="btn-group d-flex" role="group" aria-label="Basic outlined example"">
                            <button wire:click=" sortByStatus" type="button"
                            class="btn {{ is_null($status) ? 'btn-outline-primary' : 'btn-defaults' }}">
                            <span class="mr-1">Të gjitha</span>
                            {{-- <span style="color: red;" class="badge badge-pill badge-info"></span> --}}
                            </button>
                            <button wire:click="sortByStatus('1')" type="button"
                                class="btn {{ $status === '1' ? 'btn-outline-primary' : 'btn-default' }}">
                                <span class="mr-1">Vetëm Aktivet</span>
                                {{-- <span style="color: red;" class="badge badge-pill badge-primary"></span> --}}
                            </button>
                            <button wire:click.prevent="sortByStatus('false')" type="button"
                                class="btn {{ $status === '0' ? 'btn-outline-primary' : 'btn-default' }}">
                                <span class="mr-1">Vetëm Jo Aktivet</span>
                                <span style="color: red;" class="badge badge-pill badge-success"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="search" placeholder="kerko" class="form-control" wire:model='search'>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-striped table-responsive table-bordered shadow-sm"
                wire:loading.class='text-muted'>
                <thead>

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
                    <th scope="col">Kategoria
                        <span wire:click='sortBy("category")' class="text-sm" style="cursor: pointer">
                            <i
                                class="fa fa-arrow-up {{ $sortBy === 'category' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                            <i
                                class="fa fa-arrow-down {{ $sortBy === 'category' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                        </span>
                    </th>
                    <th width='11%' scope='col'>Aktiviteti
                        <span wire:click='sortBy("is_active")' class="text-sm" style="cursor: pointer">
                            <i
                                class="fa fa-arrow-up {{ $sortBy === 'is_active' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                            <i
                                class="fa fa-arrow-down {{ $sortBy === 'is_active' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                        </span>
                    </th>
                    <th width='10%' scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $categorie)
                        <tr>
                            <td>
                                <input class="" wire:model='selectIteams' value="{{ $categorie->id }}"
                                    type="checkbox" id="flexCheckDefault">
                            </td>
                            <th scope="row">
                                {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                            </th>
                            <td>{{ $categorie->category }}</td>
                            <td> {{ $categorie->is_active == 1 ? 'Aktive' : 'JoAktive' }} </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    {{-- Edit --}}
                                    @can('category_edit')
                                        <button type="button" class="btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateCategory"
                                            wire:click.prevent='edit({{ $categorie->id }})'>
                                            <i class="far fa-edit" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Edit"></i>
                                        </button>
                                    @endcan

                                    @can('category_delete')
                                        {{-- Delete --}}
                                        <button type="button" class="btn btn-sm  btn-outline-primary"
                                            wire:click.prevent='delete({{ $categorie->id }})'>
                                            <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete"></i>
                                        </button>
                                    @endcan
                                    {{-- Show --}}
                                    <button type="button" class="btn btn-sm  btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editTodo">
                                        <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Show"></i>
                                    </button>

                                    {{-- Aktive --}}
                                    @if ($categorie->is_active == 1)
                                        @can('category_access')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                wire:click.prevent='unactive({{ $categorie->id }})'>
                                                <i class="fas fa-ban" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="UnPublik"></i>
                                            </button>
                                        @endcan
                                    @else

                                        {{-- UnActive --}}
                                        @can('category_accept')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                wire:click.prevent='active({{ $categorie->id }})'>
                                                <i class="far fa-check-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Publik"></i>
                                            </button>
                                        @endif
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
            {{ $categories->links() }}
        </div>
    </div>
</div>
