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
<body class="bg-gray-50 font-sans text-gray-800">



    {{-- Encabezado personalizado --}}
    {{-- Encabezado personalizado --}}
    <header x-data="{ open: false }" class="bg-white shadow-md fixed w-full z-20 top-0 left-0">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-indigo-700">Refacciones Móviles</a>

            {{-- Menú desktop --}}
            <nav class="hidden md:flex space-x-8 font-medium text-gray-700">
                <a href="/" class="hover:text-cyan-600 transition">Inicio</a>
                <a href="#productos" class="hover:text-cyan-600 transition">Productos</a>
                <a href="#categorias" class="hover:text-cyan-600 transition">Categorías</a>
                <a href="#nosotros" class="hover:text-cyan-600 transition">Nosotros</a>
                <a href="#contacto" class="hover:text-cyan-600 transition">Contacto</a>
            </nav>

            {{-- Botones derecha --}}
            <div class="flex items-center gap-4">
                <!-- Botón carrito -->
                @livewire('boton-carrito')

                <!-- Botón hamburguesa mobile -->
                <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" 
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" 
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        @livewire('carrito')


        {{-- Menú responsive --}}
        <div x-show="open" x-transition class="md:hidden bg-white border-t">
            <nav class="px-6 py-4 space-y-2 font-medium text-gray-700">
                <a href="/" class="block hover:text-cyan-600 transition">Inicio</a>
                <a href="#productos" class="block hover:text-cyan-600 transition">Productos</a>
                <a href="#categorias" class="block hover:text-cyan-600 transition">Categorías</a>
                <a href="#nosotros" class="block hover:text-cyan-600 transition">Nosotros</a>
                <a href="#contacto" class="block hover:text-cyan-600 transition">Contacto</a>
            </nav>
        </div>
    </header>

    {{-- Contenido principal --}}
    <main class="max-w-7xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    {{-- Pie de página --}}
    <footer class="bg-gray-900 text-gray-300 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10">
            
            <!-- Logo y descripción -->
            <div>
                <h3 class="text-2xl font-bold text-white">Refacciones Móviles</h3>
                <p class="mt-4 text-sm text-gray-400">
                    Venta de refacciones para celulares, tablets y accesorios. 
                    Productos de calidad a los mejores precios, con atención personalizada.
                </p>
            </div>

            <!-- Información de contacto -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Contacto</h4>
                <p class="text-gray-400">📍 Av. Tecnológico 456, Ciudad</p>
                <p class="text-gray-400">📞 +52 123 456 7890</p>
                <p class="text-gray-400">✉️ ventas@refaccionesmoviles.com</p>
                <p class="text-gray-400 mt-2">🕒 Lunes a Sábado: 9:00 am - 7:00 pm</p>
            </div>

            <!-- Redes sociales -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Síguenos</h4>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-cyan-400 transition">Facebook</a>
                    <a href="#" class="hover:text-cyan-400 transition">Instagram</a>
                    <a href="#" class="hover:text-cyan-400 transition">WhatsApp</a>
                </div>
            </div>
        </div>

        <!-- Copy -->
        <div class="text-center text-gray-500 text-sm mt-10 border-t border-gray-700 pt-6">
            © {{ date('Y') }} Refacciones Móviles. Todos los derechos reservados.
        </div>
    </footer>

    <!-- Botón flotante WhatsApp -->
    <a href="https://wa.me/2841022581?text=Hola,%20quiero%20más%20información%20sobre%20sus%20productos" 
    target="_blank"
    class="fixed bottom-6 right-6 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg p-4 flex items-center justify-center transition transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" 
            class="h-7 w-7" 
            fill="currentColor" 
            viewBox="0 0 24 24">
            <path d="M12 0C5.372 0 0 5.373 0 12c0 2.114.553 4.159 1.605 5.961L0 24l6.293-1.646C8.235 23.446 10.096 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75c-1.755 0-3.46-.467-4.95-1.352l-.354-.207-3.74.976.999-3.64-.23-.375C2.933 15.553 2.25 13.806 2.25 12 2.25 6.624 6.624 2.25 12 2.25S21.75 6.624 21.75 12 17.376 21.75 12 21.75zm5.221-7.174c-.297-.148-1.755-.867-2.026-.967-.271-.099-.468-.148-.666.149-.198.296-.764.967-.936 1.165-.173.198-.347.223-.644.074-.297-.148-1.254-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.058-.173-.296-.018-.456.13-.604.134-.134.297-.347.446-.52.149-.173.198-.297.297-.495.099-.198.05-.371-.025-.52-.075-.149-.666-1.605-.913-2.2-.24-.579-.484-.5-.666-.51-.173-.009-.371-.011-.569-.011s-.52.074-.793.371c-.272.297-1.04 1.015-1.04 2.473s1.065 2.868 1.213 3.065c.148.198 2.096 3.2 5.082 4.487.71.306 1.264.489 1.696.626.712.227 1.36.195 1.872.118.571-.085 1.755-.717 2.004-1.41.248-.694.248-1.288.173-1.41-.074-.124-.271-.198-.569-.347z"/>
        </svg>
    </a>
    @stack('scripts')
</body>
</html>
