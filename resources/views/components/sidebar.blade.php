<aside class="w-64 bg-[#1E3A8A] text-white flex flex-col justify-between shadow-lg" x-data="{ open: false }">
    <div class="px-6 py-6">
        <h1 class="text-2xl font-bold mb-8 tracking-wide">LabQuimic</h1>

        <nav class="space-y-2 text-sm">
            @auth
                @if (auth()->user()->tienePerfil('Administrador'))
                    <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Clientes</a>
                    <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Doctores</a>
                @endif

                {{-- Dropdown Analisis --}}
                <div x-data="{ analisisOpen: false }">
                    <button @click="analisisOpen = !analisisOpen" class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9] flex justify-between items-center">
                        <span>Analisis</span>
                        <svg :class="{ 'rotate-180': analisisOpen }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="analisisOpen" x-transition class="mt-1 space-y-1 pl-4">
                        @if (auth()->user()->tienePerfil('Capturista'))
                            <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Analisis</a>
                        @endif
                        @if (auth()->user()->tienePerfil('Administrador'))
                            <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Analisis</a>
                            <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Metodo</a>
                            <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Muestra</a>
                            <a href="/unidades" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Unidades</a>
                            <a href="/analisis" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Categoria de Hemograma Completo</a>
                        @endif
                    </div>
                </div>

                @if (auth()->user()->tienePerfil('Administrador'))
                    {{-- Dropdown Usuarios --}}
                    <div x-data="{ usuariosOpen: false }">
                        <button @click="usuariosOpen = !usuariosOpen" class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9] flex justify-between items-center">
                            <span>Usuarios</span>
                            <svg :class="{ 'rotate-180': usuariosOpen }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="usuariosOpen" x-transition class="mt-1 space-y-1 pl-4">
                            <a href="/usuarios" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Usuarios</a>
                            <a href="/perfiles" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Perfiles</a>
                            <a href="/permisos" class="block px-3 py-2 rounded hover:bg-[#0EA5E9]">Permisos</a>
                        </div>
                    </div>
                @endif

                <form method="POST" action="/logout" class="mt-6">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9]">
                        Cerrar sesión
                    </button>
                </form>
            @endauth
        </nav>
    </div>

    <div class="px-6 py-4 text-sm text-[#93c5fd]">
        © {{ date('Y') }} LabQuimic
    </div>
</aside>
