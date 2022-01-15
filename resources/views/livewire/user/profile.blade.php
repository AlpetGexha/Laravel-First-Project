<x-jet-form-section submit="updateSocialProfileInformation">
    <x-slot name="title">
        {{ __('Informacioni i Profilit') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Bio dhe rrjetet sociales.') }}
    </x-slot>

    @if (auth()->user()->hasProfile())

        <x-slot name="form">
            <div class="w-md-75">
                {{-- bio --}}
                <div class="mb-3">
                    <x-jet-label for="bio" value="{{ __('Bio') }}" />
                    <textarea class="form-control" class="{{ $errors->has('bio') ? 'is-invalid' : '' }}"
                        wire:model="bio" autocomplete="bio" id="floatingTextarea2" style="height: 100px"></textarea>
                    <x-jet-input-error for="bio" />
                </div>

                {{-- url --}}
                <div class="mb-3">
                    <x-jet-label for="url" value="{{ __('Mund të jepni çfarëdo linki(url)') }}" />
                    <x-jet-input id="url" type="url" class="{{ $errors->has('url') ? 'is-invalid' : '' }}"
                        placeholder="https://www.domain.com/" wire:model="url" autocomplete="url" />
                    <x-jet-input-error for="url" />
                </div>

                {{-- github --}}
                <div class="mb-3">
                    <x-jet-label for="github" value="{{ __('Github Username') }}" />
                    <x-jet-input id="github" type="text" class="{{ $errors->has('github') ? 'is-invalid' : '' }}"
                        wire:model="github" autocomplete="github" />
                    <x-jet-input-error for="github" />
                    <span class="text-muted">https://www.github.com/{{ $github }}</span>
                </div>

                {{-- twitter --}}
                <div class="mb-3">
                    <x-jet-label for="twitter" value="{{ __('Twitter Username') }}" />
                    <x-jet-input id="twitter" type="text" class="{{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                        wire:model="twitter" autocomplete="twitter" />
                    <x-jet-input-error for="twitter" />
                    <span class="text-muted">https://www.twitter.com/{{ $twitter }}</span>
                </div>

                {{-- facebook --}}
                <div class="mb-3">
                    <x-jet-label for="Facebook" value="{{ __('Facebook Username') }}" />
                    <x-jet-input id="Facebook" type="text" class="{{ $errors->has('Facebook') ? 'is-invalid' : '' }}"
                        wire:model="Facebook" autocomplete="Facebook" />
                    <x-jet-input-error for="Facebook" />
                    <span class="text-muted">https://www.facebook.com/{{ $facebook }}</span>
                </div>

                {{-- instagram --}}
                <div class="mb-3">
                    <x-jet-label for="twitter" value="{{ __('Twitter Username') }}" />
                    <x-jet-input id="twitter" type="text" class="{{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                        wire:model="twitter" autocomplete="twitter" />
                    <x-jet-input-error for="twitter" />
                    <span class="text-muted">https://www.twitter.com/{{ $twitter }}</span>
                </div>

                {{-- linkedin --}}
                <div class="mb-3">
                    <x-jet-label for="linkedin" value="{{ __('Linkedin Username') }}" />
                    <x-jet-input id="linkedin" type="text" class="{{ $errors->has('linkedin') ? 'is-invalid' : '' }}"
                        wire:model="linkedin" autocomplete="linkedin" />
                    <x-jet-input-error for="linkedin" />
                    <span class="text-muted">https://www.linkedin.com/in/{{ $linkedin }}</span>

                </div>

                {{-- youtube --}}
                <div class="mb-3">
                    <x-jet-label for="youtube" value="{{ __('Kanali i Youtubit') }}" />
                    <x-jet-input id="youtube" type="text" class="{{ $errors->has('youtube') ? 'is-invalid' : '' }}"
                        wire:model="youtube" autocomplete="youtube" />
                    <x-jet-input-error for="youtube" />
                    <span class="text-muted">https://www.youtube.com/c/{{ $youtube }}</span>
                </div>

            </div>
        </x-slot>
    @else
        <button wire:click.prevent='create' class="btn btn-dark text-uppercase">Krijo Profilin</button>
    @endif
    <x-slot name="actions">
        <div class="d-flex align-items-baseline">
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
