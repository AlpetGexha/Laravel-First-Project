<div class="card-body" >
    <form method="POST" action="{{ route('login') }}">
        <x-alert />
        {{-- Title --}}
        <div class="mb-3">
            <x-jet-label value="{{ __('Kateogira') }}" />

            <x-jet-input class="{{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" wire:model='category'
                name="category"  wire:loading.attr='disabled' required />
            <x-jet-input-error for="category"></x-jet-input-error>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <x-jet-button wire:click.prevent='store()' wire:loading.attr='disabled'>
                    {{ __('Posto') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>
