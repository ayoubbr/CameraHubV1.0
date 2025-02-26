<x-guest-layout>
    <div class="auth-card">
        <div class="logo-container">
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-label for="name" :value="__('Name')" class="form-label" />
                <x-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" class="form-label" />
                <x-input id="email" class="form-input" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-label for="password" :value="__('Password')" class="form-label" />
                <x-input id="password" class="form-input"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                <x-input id="password_confirmation" class="form-input"
                        type="password"
                        name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="btn ml-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>