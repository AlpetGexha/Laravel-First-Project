<div class="card-body">
    <!-- Select2 -->
   
    <form method="POST">
        <x-alert />
        {{-- Title --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Titulli') }}" />

            <x-jet-input class="{{ $errors->has('Titulli') ? 'is-invalid' : '' }}" type="text" wire:model='Titulli'
                name="Titulli" required />
            <x-jet-input-error for="Titulli"></x-jet-input-error>
        </div>

        {{-- Textare --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Pershkrimi') }}" />

            <x-jet-input class="{{ $errors->has('Teksti') ? 'is-invalid' : '' }}" type="text" wire:model='Teksti'
                name="Teksti" required />
            <x-jet-input-error for="Teksti"></x-jet-input-error>
        </div>

        {{-- Kategoria --}}
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label>Kategoria</label>
                <div wire:ignore>
                    <select class="select2 form-select" multiple ata-placeholder="Any" wire:model="category" d>
                        <livewire:category.post-create />
                    </select>
                </div>
                @error('category')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- tags
        <div class="mb-3">
            <x-jet-label value="{{ __('Tagat') }}" />

            <x-jet-input class="{{ $errors->has('Tags') ? 'is-invalid' : '' }}" type="text" wire:model=' Tags'
                name="Tags" required />
            <x-jet-input-error for="Tags"></x-jet-input-error>
        </div> --}}

        {{-- Photo --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Foto') }}" />

            <x-jet-input class="{{ $errors->has('Foto') ? 'is-invalid' : '' }}" type="file" accept="Image/*"
                wire:model='Foto' name="Foto" />
            <x-jet-input-error for="Foto"></x-jet-input-error>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <x-jet-button wire:click.prevent="store()">
                    {{ __('Posto') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>

