<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | Panel Administrador</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body x-data="{ open: false }" class="font-sans antialiased bg-gray-50 h-[100dvh] flex flex-col">

        {{-- Sidebar --}}
        <x-sidebar />
        <div x-show="open" @click="open = false" class="fixed inset-0 bg-black/50 z-40 md:hidden"></div>
            
        {{-- Page Heading --}}
        @isset($header)
        <header class="h-16 lg:hidden  lg:pl-[17rem]  bg-gray-800 backdrop-blur-md shadow-md flex items-center justify-between">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white font-semibold flex-1 flex items-center justify-between">
                {{ $header }}

                {{-- Botón hamburguesa móvil --}}
                <button 
                   @click="open = true"
                    class="md:hidden p-2 rounded bg-white/20 hover:bg-white/30 transition"
                >
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>
        </header>
        @endisset

        {{-- Page Content --}}
       <main class="h-[calc(100dvh-10rem)] lg:ml-[17rem] flex-1   p-4 rounded-xl mx-3 my-4 flex flex-col ">
            {{ $slot }}
        </main>

        {{-- FOOTER --}}
        <footer class="bg-white lg:ml-[17rem]  rounded-lg shadow-lg m-4">
            <div class="w-full mx-auto max-w-screen-xl p-4 text-center">
                <span class="text-sm text-gray-500 ">           
                    © 2025 - Todos los derechos reservados
                </span>
            </div>
        </footer>


        @livewireScripts
        @stack('scripts')
    </body>
</html>
@push('scripts')
<script>
    document.querySelectorAll('.number-format').forEach(input => {
        // Mostrar con separadores al cargar
        input.value = Number(input.value).toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});

        // Formatear al escribir
        input.addEventListener('input', e => {
            let raw = e.target.value.replace(/,/g, '').replace(/\s/g, '');
            if (!isNaN(raw) && raw !== '') {
                e.target.value = Number(raw).toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            }
        });

        // Antes de enviar el form → limpiar formato
        input.form.addEventListener('submit', () => {
            let raw = input.value.replace(/,/g, '').replace(/\s/g, '');
            input.value = raw;
        });
    });
</script>
@endpush

