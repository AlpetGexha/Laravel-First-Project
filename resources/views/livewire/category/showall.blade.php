<div wire:model='categories' class="">
    <h4><strong> {{$categories->count()}} Kategori</strong></h4>
    <ul class="list-group mt-2 shadow-sm">
        @foreach ($categories as $categorie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('category.single', $categorie->slug) }}">{{ $categorie->category }}</a>
                <span class="badge badge-sm bg-success"> {{ $categorie->category()->count() }}</span>
            </li>
        @endforeach
    </ul>
</div>
