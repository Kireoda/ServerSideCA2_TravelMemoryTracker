<x-guest-layout>
    <h1>{{ __('Verify your email') }}</h1>
    <p class="status-text">
        {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking on the link we emailed to you. If you didn\'t receive the email, we can send another.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="flash-success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="auth-actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend Verification Email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="button button-secondary">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
