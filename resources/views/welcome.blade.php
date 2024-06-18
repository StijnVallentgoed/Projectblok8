<!DOCTYPE html>
<html lang="{{ str_replace('', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="antialiased">

    <nav>
        @auth
            <x-app-layout>
                <div class="container mx-auto py-8">
                    <h1 class="text-4xl font-bold mb-8">Nova College nieuws </h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Add your content here -->
                    </div>
                    <a href="{{ route('nieuws.index') }}" class="text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">Bekijk Nieuws</a>
                </div>
            </x-app-layout>
        @else
            <div class="container mx-auto">
                <header class="flex justify-end items-center py-4">
                    <a href="{{ route('login') }}" class="text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-black hover:text-black/70 dark:text-white dark:hover:text-white/80">Register</a>
                    @endif
                </header>
            </div>
        @endauth
    </nav>

</body>
</html>
