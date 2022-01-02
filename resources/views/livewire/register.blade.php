<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <x-jet-label value="{{ __('Emri') }}" />

                    <x-jet-input class="{{ $errors->has('emri') ? 'is-invalid' : '' }}" type="text" name="emri"
                        :value="old('emri')" required autofocus autocomplete="emri" />
                    <x-jet-input-error for="emri"></x-jet-input-error>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <x-jet-label value="{{ __('Mbiemri') }}" />

                    <x-jet-input class="{{ $errors->has('mbiemri') ? 'is-invalid' : '' }}" type="text" name="mbiemri"
                        :value="old('mbiemri')" required autofocus autocomplete="mbiemri" />
                    <x-jet-input-error for="mbiemri"></x-jet-input-error>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Email') }}" />

            <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                :value="old('email')" required />
            <x-jet-input-error for="email"></x-jet-input-error>
        </div>
        <div class="mb-3">
            <x-jet-label value="{{ __('Username') }}" />

            <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username"
                :value="old('username')" required autofocus autocomplete="username" />
            <x-jet-input-error for="username"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Password') }}" />

            <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password"
                required autocomplete="new-password" />
            <x-jet-input-error for="password"></x-jet-input-error>
        </div>

        <div class="mb-3">
            <x-jet-label value="{{ __('Confirm Password') }}" />

            <x-jet-input class="form-control" type="password" name="password_confirmation" required
                autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mb-3">
            <div class="custom-control custom-checkbox">
                <x-jet-checkbox id="terms" name="terms" />
                <label class="custom-control-label" for="terms">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of
                        Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy
                        Policy').'</a>',
                    ]) !!}
                </label>
            </div>
        </div>
        @endif

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button>
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </div>
    </form>
</div>