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

        <x-jet-label value="{{ __('Përshkrimi') }}" />
        <x-textarea class="{{ $errors->has('Teksti') ? 'is-invalid' : '' }}" type="text" wire:model='Teksti'
            name="Teksti" required />
        <x-jet-input-error for="Teksti"></x-jet-input-error>

        {{-- Kategoria --}}
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label>{{ __('Kategoria') }}</label>
                <div wire:ignore>
                    <select id='category-dropdown' class="select2 form-select" multiple wire:model="category">
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
                <x-jet-button wire:click.prevent="{{ $edit_id == null ? 'store()' : 'update()' }}">
                    {{ __($edit_id == null ? 'Posto' : 'Ndrysho') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#category-dropdown').select2();
        $('#category-dropdown').on('change', function(e) {
            let data = $(this).val();
            @this.set('category', data);
        });
        window.livewire.on('addPosts', () => {
            $('#category-dropdown').select2();
        });
    });
</script>
