<div>
    @foreach ($categorys as $categorie)
        <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
    @endforeach
</div>
