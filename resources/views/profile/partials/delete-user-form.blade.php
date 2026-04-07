<section>
    <header class="section-header">
        <h3>{{ __('Delete Account') }}</h3>
        <p class="status-text">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="form-stack">
        @csrf
        @method('delete')

        <div class="form-group">
            <x-input-label for="delete_password" :value="__('Confirm Password')" />
            <x-text-input
                id="delete_password"
                name="password"
                type="password"
                placeholder="{{ __('Password') }}"
                required
            />
            <x-input-error :messages="$errors->userDeletion->get('password')" />
        </div>

        <div class="form-actions">
            <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
        </div>
    </form>
</section>
