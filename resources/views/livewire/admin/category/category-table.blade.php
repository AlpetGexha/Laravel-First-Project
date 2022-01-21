<div class="container-fluid">
    @include('livewire.admin.category.update')
    <div class="card shadow">
        <div class="card-header">
            Kategorit
        </div>
        <div class="card-body">
            @if ($selectPage || $selectIteams)
                <div class="alert alert-info">

                    @if ($selectAll)
                        <button class="btn btn-primary" wire:click.prevent='unSelectAll'>Hiq selektimin për të gjitha
                            kolonat</button>
                    @else
                        <button class="btn btn-primary" wire:click.prevent='selectAll'>Selektoj të gjitha kolonat
                        </button>
                        <button class="btn btn-primary" wire:click.prevent='selectAllHere'>Selektoj të gjitha kolonat në
                            kete faqe</button>
                    @endif


                    @if ($search)
                        <button class="btn btn-primary" wire:click.prevent='selectAllOnSearch'>Select
                            All with search</button>
                    @endif

                </div>
                <button class="btn btn-danger" wire:click.prevent='deleteSelectIteams'>Delete
                    Selection {{ count($selectIteams) }}
                </button>
            @endif
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
            <table class="table table-hover table-striped table-responsive table-bordered shadow-sm"
                wire:loading.class='text-muted'>
                <thead>
                    <tr>
                        <th width='1%' scope="col">
                            <input class="" wire:model='selectPage' type="checkbox" id="flexCheckDefault">
        </div>
        </th>
        <th width='8%' scope="col">#
            <span wire:click='sortBy("id")' class="text-sm" style="cursor: pointer">
                <i class="fa fa-arrow-up {{ $sortBy === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
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

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            {{-- Edit --}}
                            @can('category_edit')
                                <button type="button" class="btn  btn-sm btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#updateCategory" wire:click.prevent='edit({{ $categorie->id }})'>
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
