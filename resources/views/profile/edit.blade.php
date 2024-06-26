<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            @if (session('status') === 'profile-updated')
                <div class="p-4 sm:p-8 bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200 shadow sm:rounded-lg">
                    <p>{{ __('Profile updated successfully.') }}</p>
                </div>
            @elseif (session('status') === 'password-updated')
                <div class="p-4 sm:p-8 bg-green-100 text-green-700 dark:bg-green-800 dark:text-green-200 shadow sm:rounded-lg">
                    <p>{{ __('Password updated successfully.') }}</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
