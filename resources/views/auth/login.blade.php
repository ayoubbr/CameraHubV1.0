<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="auth-logo" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="session-status" :status="session('status')" />

        <!-- Validation Errors -->
        <x-validation-errors class="validation-errors" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="form-checkbox-group">
                <label for="remember_me" class="checkbox-label">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="checkbox-text">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-actions-between">
                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="login-button">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>