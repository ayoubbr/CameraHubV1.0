<x-guest-layout>
    <div class="auth-card">
        <div class="logo-container">
            <a href="/">
                <x-application-logo />
            </a>
        </div>

        <div class="verification-message">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="action-container">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button type="submit" class="btn">
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="text-link">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>