<div>
    {{-- <select wire:model='category' multiple class="{{ $errors->has('category') ? 'is-invalid' : '' }}" name="category"
        required>
        @foreach ($categories as $categorie)
            {{ $categorie->category }}
        @endforeach
    </select> --}}



    <select class="form-select {{ $errors->has('category') ? 'is-invalid' : '' }}" wire:model='category'
        name="category" required ' aria-label="Default select example" multiple>
        @foreach ($categories as $categorie)
            <option value="{{ $categorie->category }}">{{ $categorie->category }}</option>
        @endforeach
    </select>

    <x-jet-input-error for="category"></x-jet-input-error>
</div>
