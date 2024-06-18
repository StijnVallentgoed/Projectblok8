<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Voornaam -->
        <div>
            <x-input-label for="voornaam" :value="__('Voornaam')" />
            <x-text-input id="voornaam" class="block mt-1 w-full" type="text" name="voornaam" :value="old('voornaam')" required autofocus autocomplete="given-name" />
            <x-input-error :messages="$errors->get('voornaam')" class="mt-2" />
        </div>

        <!-- Tussenvoegsel -->
        <div class="mt-4">
            <x-input-label for="tussenvoegsel" :value="__('Tussenvoegsel')" />
            <x-text-input id="tussenvoegsel" class="block mt-1 w-full" type="text" name="tussenvoegsel" :value="old('tussenvoegsel')" autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('tussenvoegsel')" class="mt-2" />
        </div>

        <!-- Achternaam -->
        <div class="mt-4">
            <x-input-label for="achternaam" :value="__('Achternaam')" />
            <x-text-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" :value="old('achternaam')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('achternaam')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Huisnummer -->
        <div class="mt-4">
            <x-input-label for="huisnummer" :value="__('Huisnummer')" />
            <x-text-input id="huisnummer" class="block mt-1 w-full" type="text" name="huisnummer" :value="old('huisnummer')" required autocomplete="address-line2" />
            <x-input-error :messages="$errors->get('huisnummer')" class="mt-2" />
        </div>

        <!-- Straatnaam -->
        <div class="mt-4">
            <x-input-label for="straatnaam" :value="__('Straatnaam')" />
            <x-text-input id="straatnaam" class="block mt-1 w-full" type="text" name="straatnaam" :value="old('straatnaam')" required autocomplete="address-line1" />
            <x-input-error :messages="$errors->get('straatnaam')" class="mt-2" />
        </div>

        <!-- Postcode -->
        <div class="mt-4">
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" required autocomplete="postal-code" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
        </div>

        <!-- Plaatsnaam -->
        <div class="mt-4">
            <x-input-label for="plaatsnaam" :value="__('Plaatsnaam')" />
            <x-text-input id="plaatsnaam" class="block mt-1 w-full" type="text" name="plaatsnaam" :value="old('plaatsnaam')" required autocomplete="address-level2" />
            <x-input-error :messages="$errors->get('plaatsnaam')" class="mt-2" />
        </div>

        <!-- Land -->
        <div class="mt-4">
            <x-input-label for="land" :value="__('Land')" />
            <x-text-input id="land" class="block mt-1 w-full" type="text" name="land" :value="old('land')" required autocomplete="country-name" />
            <x-input-error :messages="$errors->get('land')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
