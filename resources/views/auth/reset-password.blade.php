<x-guest-layout>
    <div class="auth-card">
        <div class="logo-container">
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" class="form-label" />
                <x-input id="email" class="form-input" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-label for="password" :value="__('Password')" class="form-label" />
                <x-input id="password" class="form-input" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                <x-input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required />
            </div>

            <div class="form-actions">
                <button type="submit" class="btn">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>