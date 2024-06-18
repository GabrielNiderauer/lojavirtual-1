<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <header class="bg-gray-600 shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <div>
                        <a href="{{ route('home') }}">
                            <x-application-logo class="block h-10 w-auto" />
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700">Login</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 ml-3 bg-green-500 text-white rounded-md hover:bg-green-700">Registro</a>
                    </div>
                </div>
            </header>

            {{ $slot }} 

        </div>
    </body>
</html>