<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
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


        {{-- category --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Kategoria') }}" />

            <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" wire:model='Kategoria'
                name="username" required />
            <x-jet-input-error for="username"></x-jet-input-error>
        </div>

        {{-- tags --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Tagat') }}" />

            <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" wire:model='Tags'
                name="username" required />
            <x-jet-input-error for="username"></x-jet-input-error>

        </div>

        {{-- Photo --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Foto') }}" />

            <x-jet-input class="{{ $errors->has('Foto') ? 'is-invalid' : '' }}" type="file" accept="Image/*"
                wire:model='Foto' name="Foto" />
            <x-jet-input-error for="Foto"></x-jet-input-error>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <x-jet-button wire:click.prevent='store()'>
                    {{ __('Posto') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>