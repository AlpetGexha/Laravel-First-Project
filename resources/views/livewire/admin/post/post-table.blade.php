<div class="container-fluid">
    <x-alert />
    @include('livewire.admin.post.show')
    <div class="card shadow">
        <div class="card-header">
            Postimet
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
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered shadow-sm text-center">
                    <thead wire:loading.class='text-muted'>
                        <tr>
                            <th width='1%' scope="col">
                                <input class="" wire:model='selectPage' type="checkbox"
                                    id="flexCheckDefault">
                            </th>
                            <th width='5%' scope="col">#
                                {{-- <x-sort :by='id' /> --}}
                                <span wire:click='sortBy("id")' class="text-sm" style="cursor: pointer">
                                    <i
                                        class="fa fa-arrow-up {{ $sortBy === 'id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortBy === 'id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                </span>
                            </th>
                            <th scope="col">Foto</th>
                            <th width='12%' scope="col">Titulli
                                <span wire:click='sortBy("title")' class="text-sm" style="cursor: pointer">
                                    <i
                                        class="fa fa-arrow-up {{ $sortBy === 'title' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortBy === 'title' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                </span>
                            </th>
                            <th width='22%' scope="col">Përshkrimi
                                <span wire:click='sortBy("body")' class="text-sm" style="cursor: pointer">
                                    <i
                                        class="fa fa-arrow-up {{ $sortBy === 'body' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortBy === 'body' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                </span>
                            </th>

                            <th width='10%' scope="col">Përdoruesi
                                <span wire:click='sortBy("user_id")' class="text-sm" style="cursor: pointer">
                                    <i
                                        class="fa fa-arrow-up {{ $sortBy === 'user_id' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                    <i
                                        class="fa fa-arrow-down {{ $sortBy === 'user_id' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                                </span>
                            </th>

                            <th width='2%' scope="col">Kategoriat</th>
                            <th width='2%' scope="col"><i class="far fa-eye fa-x2"> </th>
                            <th width='2%' scope="col"><i class="far fa-comment"></i>
                                {{-- <span wire:click='sortBy("views")' class="text-sm" style="cursor: pointer">
                                <i
                                    class="fa fa-arrow-up {{ $sortBy === 'views' && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
                                <i
                                    class="fa fa-arrow-down {{ $sortBy === 'views' && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
                            </span> --}}
                            </th>
                            <th width='2%' scope="col"> <i class="far fa-thumbs-up"></th>
                            <th width='2%' scope="col"><i class="far fa-bookmark"></i></th>
                            <th width='4%' scope="col"></th>
                        </tr>
                    </thead>
                    <tbody wire:loading.class='text-muted'>
                        @forelse ($posts as $post)

                            <tr>
                                <td>
                                    <input class="" wire:model='selectIteams' value="{{ $post->id }}"
                                        type="checkbox" id="flexCheckDefault">
                                </td>

                                <th scope="row">
                                    {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                                </th>

                                <td width='6%'>
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}"
                                        height="35px" width='35px' loading="lazy">
                                </td>

                                <td>{{ $post->title }}</td>
                                <td>
                                    <textarea readonly class="form-control" placeholder="" id="floatingTextarea"
                                        style="height: 20px">{{ $post->body }}</textarea>
                                </td>
                                <td> {{ $post->user->username }}</td>
                                {{-- <a href="{{ route('user.show', $post->user->username) }}">{{ $post->user->username }}</a> --}}
                                </td>
                                <td>
                                    @forelse ($post->category as $categorit)
                                        <span class="badge badge-primary">
                                            {{ $categorit->category->category }}</span>
                                    @empty
                                        Nuk Ka
                                    @endforelse
                                </td>


                                <td>{{ $post->views }}</td>
                                <td>{{ $post->comments()->count() }}
                                <td>{{ $post->likes()->count() }}</td>
                                <td>{{ $post->saves()->count() }}</td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        {{-- Delete --}}
                                        @can('post_delete', $post)
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                wire:click.prevent='delete({{ $post->id }})'>
                                                <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Delete"></i>
                                            </button>
                                        @endcan

                                        @can('post_show')
                                            <button type="button" class="btn btn-sm  btn-outline-primary"
                                                data-bs-toggle="modal" data-bs-target="#postShow"
                                                wire:click.prevent='edit({{ $post->id }})'>
                                                <i class="far fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Show"></i>
                                            </button>
                                        @endcan
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="12">
                                    Nuk ka resultat
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="body-footer d-flex justify-content-end">
            {{ $posts->links() }}
        </div>
    </div>
</div>
