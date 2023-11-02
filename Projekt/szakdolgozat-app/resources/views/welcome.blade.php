<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apróhirdetés</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex justify-end min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="fixed top-0 left-0">
                    <img src="{{ asset('images\welcome_blade_logo.png') }}" class="mr-4" width="100">
                    <div class="mt-4 flex justify-center"> <!-- Módosított sor -->
                        <div class="flex items-center">
                            @auth
                                <a href="{{ route('advertisements.store') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 mr-2">Hirdetés feladása</a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 bg-red-500 text-white rounded-lg hover-bg-red-600 mr-2">Hirdetés feladása</a>
                            @endauth
                            <input type="text" placeholder="Keresés" class="px-4 py-2 border border-gray-300 rounded-lg">
                            <button class="px-4 py-2 bg-red-500 text-white rounded-lg ml-2 hover-bg-red-600">Keresés</button>
                        </div>
                    </div>
                </div>
                
                <div class="fixed top-0 right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:ring focus:ring-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:ring focus:ring-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:ring focus:ring-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
