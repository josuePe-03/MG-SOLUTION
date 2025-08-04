<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Panel Administrador') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-indigo-900 via-indigo-950 to-slate-900 text-gray-100">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10">
        <div>
            <a href="/">
                {{-- Reemplaza con tu logotipo si tienes uno personalizado --}}
                <x-application-logo class="w-24 h-24 text-white" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-lg text-gray-900">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
