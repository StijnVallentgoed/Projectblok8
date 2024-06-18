<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="voornaam" :value="__('Voornaam')" />
            <x-text-input id="voornaam" name="voornaam" type="text" class="mt-1 block w-full" :value="old('voornaam', $user->voornaam)" required autofocus autocomplete="given-name" />
            <x-input-error class="mt-2" :messages="$errors->get('voornaam')" />
        </div>

        <div>
            <x-input-label for="tussenvoegsel" :value="__('Tussenvoegsel')" />
            <x-text-input id="tussenvoegsel" name="tussenvoegsel" type="text" class="mt-1 block w-full" :value="old('tussenvoegsel', $user->tussenvoegsel)" autocomplete="additional-name" />
            <x-input-error class="mt-2" :messages="$errors->get('tussenvoegsel')" />
        </div>

        <div>
            <x-input-label for="achternaam" :value="__('Achternaam')" />
            <x-text-input id="achternaam" name="achternaam" type="text" class="mt-1 block w-full" :value="old('achternaam', $user->achternaam)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('achternaam')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
