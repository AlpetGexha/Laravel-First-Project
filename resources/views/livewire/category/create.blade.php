<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        <x-alert />
        {{-- Title --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Kateogira') }}" />

            <x-jet-input class="{{ $errors->has('Kateogira') ? 'is-invalid' : '' }}" type="text" wire:model='Kateogira'
                name="Kateogira" required />
            <x-jet-input-error for="Kateogira"></x-jet-input-error>
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