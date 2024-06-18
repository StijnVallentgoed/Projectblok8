<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'voornaam' => ['required', 'string', 'max:255'],
            'tussenvoegsel' => ['nullable', 'string', 'max:255'],
            'achternaam' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'huisnummer' => ['required', 'string', 'max:255'],
            'straatnaam' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'plaatsnaam' => ['required', 'string', 'max:255'],
            'land' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'voornaam' => $request->voornaam,
            'tussenvoegsel' => $request->tussenvoegsel,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Huisnummer' => $request->huisnummer,
            'Straatnaam' => $request->straatnaam,
            'Postcode' => $request->postcode,
            'plaatsnaam' => $request->plaatsnaam,
            'Land' => $request->land,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('welcome', absolute: false));
    }
}
