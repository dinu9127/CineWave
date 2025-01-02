<section class="bg-gray-50 p-6 rounded-lg shadow-lg max-w-3xl mx-auto mt-10">
    <header>
        <h2 class="text-2xl font-semibold text-indigo-700">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-2 text-sm text-gray-700">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-gray-800 font-medium" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-600" />
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-gray-800 font-medium" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-600" />
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-gray-800 font-medium" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center gap-4  mt-4">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
