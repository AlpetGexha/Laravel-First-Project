<div wire:model='categoriess'>
    @foreach ($categories as $categorie)
        <a href="{{ route('category.single', $categorie->slug) }}">{{ $categorie->category }}</a>
        {{ $categorie->category()->count() }} <br>
    @endforeach
</div>
