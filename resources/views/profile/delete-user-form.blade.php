<x-jet-action-section>
    <x-slot name="title">
        {{ __('Fshij llogarine') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Fshini përgjithmonë llogarinë tuaj.') }}
    </x-slot>

    <x-slot name="content">
        <div>
            {{ __('Pasi të fshihet llogaria juaj, të gjitha burimet dhe të dhënat e saj do të fshihen përgjithmonë. Përpara se të fshini llogarinë tuaj, shkarkoni çdo të dhënë ose informacion që dëshironi të ruani.') }}
        </div>

        <div class="mt-3">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Fshij llogarine') }}
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Fshij llogarine') }}
            </x-slot>

            <x-slot name="content">
                {{ __('A jeni i sigurt që dëshironi të fshini llogarinë tuaj? Pasi të fshihet llogaria juaj, të gjitha burimet dhe të dhënat e saj do të fshihen përgjithmonë. Ju lutemi shkruani fjalëkalimin tuaj për të konfirmuar se dëshironi të fshini përgjithmonë llogarinë tuaj.') }}

                <div class="mt-2 w-md-75" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="{{ __('Password') }}"
                                 x-ref="password"
                                 wire:model.defer="password"
                                 wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')"
                                        wire:loading.attr="disabled">
                    {{ __('Anuloje') }}
                </x-jet-secondary-button>

                <x-jet-danger-button wire:click="deleteUser" wire:loading.attr="disabled">
                    <div wire:loading wire:target="deleteUser" class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Fshij llogarine') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>

</x-jet-action-section>
