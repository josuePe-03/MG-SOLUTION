<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LabQuimic')</title>
    @vite('resources/css/app.css')
    @stack('head')
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    {{-- Encabezado personalizado --}}
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-800">
                <a href="{{ route('home') }}">LabQuimic</a>
            </h1>
            <nav class="space-x-4 text-sm">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600">Inicio</a>
                <a href="{{ route('home') }}#servicios" class="text-gray-700 hover:text-indigo-600">Servicios</a>
                <a href="{{ route('contacto') }}" class="text-gray-700 hover:text-indigo-600">Contacto</a>
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Acceder</a>
            </nav>
        </div>
    </header>

    {{-- Contenido principal --}}
    <main class="max-w-7xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    {{-- Pie de página --}}
    <footer class="bg-indigo-900 text-white text-center py-6">
        <p>&copy; {{ date('Y') }} LabQuimic. Todos los derechos reservados.</p>
    </footer>

    @stack('scripts')
</body>
</html>
