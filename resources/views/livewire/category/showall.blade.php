<div wire:model='categories' class="">
    <h4><strong> {{ $categories_count }} Kategori</strong></h4>

    <ul class="list-group mt-2 shadow-sm">
        @foreach ($categories as $categorie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('category.single', $categorie->slug) }}">{{ $categorie->category }}</a>
                <span class="badge badge-sm bg-success"> {{ $categorie->category()->count() }}</span>
            </li>
            {{-- show more and less category --}}
        @endforeach

        <div class="d-flex justify-content-center mt-2 mb-2 ">
            <div>
                @if ($categories->total() > 0 && $categories->count() < $categories->total())
                    <button class="btn btn-outline-success btn-sm" wire:click.prevent='showMore()'>
                        Shiko më shumë Kategori
                    </button>
                @endif

                @if ($categories->count() >= 11)
                    <button class="btn btn-outline-success  btn-sm" wire:click.prevent='showLess()'>
                        Shiko më pak Kategori
                    </button>
                @endif
            </div>
        </div>
    </ul>
</div>
