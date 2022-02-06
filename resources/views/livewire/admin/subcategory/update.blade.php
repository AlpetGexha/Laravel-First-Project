<x-modal>
    <x-slot name="id">updateSubCategory</x-slot>
    <x-slot name="title">Krijo Nën Kategori të re</x-slot>
    <x-slot name="function">wire:click='update()'</x-slot>
    <x-slot name="type">Krijo</x-slot>
    <div class="row">
        <div class="d-flex bd-highlight">
            <div class="mr-auto bd-highlight"></div>

        </div>
    </div>
    <div class="d-flex bd-highlight">
        <div class="mr-auto bd-highlight">Numri për krijim</div>
        <div class="col-md-2">
            <select wire:model.defer="SubCategoryNumberSelect" class="form-control bd-highlight ">
                @foreach ($SubCategoryNumbers as $SubCategoryNumber)
                    <option value="{{ $SubCategoryNumber }}">{{ $SubCategoryNumber }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- <input type="hidden" wire:model='id'> --}}
    {{-- @if ($subcategories->categorys->is_active == 0) error @endif --}}

    <div class="mb-3">
        <x-alert />
        <x-jet-label value="{{ __('Kategoria') }}" />
        <select wire:model="categoria" class="form-control bd-highlight ">
            @foreach ($categorys as $category)
                <option value="{{ $category->category }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">

        <x-jet-label value="{{ __('Nën Kategori') }}" />
        <x-jet-input class="{{ $errors->has('subcategory') ? 'is-invalid' : '' }}" type="text" name="subcategory"
            :value="old('subcategory')" autofocus autocomplete="subcategory" wire:model.defer='subcategory' />
        <x-jet-input-error for="subcategory"></x-jet-input-error>
    </div>
    {{-- <input class="" wire:model='subcategory' value="{{ $i }}" type="text"> <br> --}}

</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">dasdas</button> --}}
