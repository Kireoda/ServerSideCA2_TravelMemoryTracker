<x-guest-layout>
    <h1>{{ __('Log in') }}</h1>
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="form-stack">
        @csrf

        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="form-group">
            <label class="status-text" for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="auth-actions">
            @if (Route::has('password.request'))
                <a class="button button-secondary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            @if (Route::has('register'))
                <a class="button button-secondary" href="{{ route('register') }}">
                    {{ __('Create account') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
