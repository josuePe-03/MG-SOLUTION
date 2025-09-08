{{-- Sidebar --}}
<aside :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 w-64 bg-[#1E3A8A]  text-white flex flex-col justify-between shadow-lg transform md:translate-x-0 transition-transform duration-300 z-50">

    <div >
        {{-- Botón cerrar en móvil --}}
        <div class="flex justify-end md:hidden p-4">
            <button @click="open = false" class="text-white text-2xl font-bold">&times;</button>
        </div>
        {{-- CONTENIDO --}}
        <div class="px-6 py-6">
            <h1 class="text-2xl font-bold mb-8 tracking-wide">La Piedad</h1>
            <nav class="space-y-2 text-sm">
                @auth
                @if (auth()->user()->tienePerfil('Administrador'))
                        <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Dashboard</a>
                        <a href="/clientes" class="{{ request()->is('clientes*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Clientes</a>
                        <a href="/doctores" class="{{ request()->is('doctores*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Doctores</a>
                    @endif

                    {{-- Dropdown Analisis --}}
                    <div x-data="{ analisisOpen: {{ request()->is('analisis*') 
                        || request()->is('hemograma_completo*') 
                        || request()->is('tipo_analisis*') 
                        || request()->is('tipo_metodo*') 
                        || request()->is('tipo_muestra*') 
                        || request()->is('unidades*') 
                        || request()->is('categoria_hemograma_completo*') ? 'true' : 'false' }} }">

                        <button @click="analisisOpen = !analisisOpen" 
                            class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9] flex justify-between items-center 
                            {{ request()->is('analisis*') 
                            || request()->is('hemograma_c   ompleto*') 
                            || request()->is('tipo_analisis*') 
                            || request()->is('tipo_metodo*') 
                            || request()->is('tipo_muestra*') 
                            || request()->is('unidades*') 
                            || request()->is('categoria_hemograma_completo*') ? 'bg-[#0EA5E9]' : '' }}">
                            
                            <span>Analisis</span>
                            <svg :class="{ 'rotate-180': analisisOpen }" 
                                class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="analisisOpen" x-transition class="mt-1 space-y-1 pl-4">
                            @if (auth()->user()->tienePerfil('Capturista') || auth()->user()->tienePerfil('Administrador'))
                                <a href="/analisis" class="{{ request()->is('analisis*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Analisis</a>
                            @endif
                            @if (auth()->user()->tienePerfil('Administrador'))
                                <a href="/hemograma_completo" class="{{ request()->is('hemograma_completo*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Hemograma Completo</a>
                                <a href="/tipo_analisis" class="{{ request()->is('tipo_analisis*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Analisis</a>
                                <a href="/tipo_metodo" class="{{ request()->is('tipo_metodo*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Metodo</a>
                                <a href="/tipo_muestra" class="{{ request()->is('tipo_muestra*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Muestra</a>
                                <a href="/unidades" class="{{ request()->is('unidades*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Unidades</a>
                                <a href="/categoria_hemograma_completo" class="{{ request()->is('categoria_hemograma_completo*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Categoria de Hemograma Completo</a>
                            @endif
                        </div>
                    </div>

                    @if (auth()->user()->tienePerfil('Administrador'))
                        {{-- Dropdown Usuarios --}}
                        <div x-data="{ usuariosOpen: {{ request()->is('usuarios*') || request()->is('perfiles*') || request()->is('permisos*') ? 'true' : 'false' }} }">
                            <button @click="usuariosOpen = !usuariosOpen"
                                class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9] flex justify-between items-center 
                                {{ request()->is('usuarios*') || request()->is('perfiles*') || request()->is('permisos*') ? 'bg-[#0EA5E9]' : '' }}">
                                
                                <span>Usuarios</span>
                                <svg :class="{ 'rotate-180': usuariosOpen }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="usuariosOpen" x-transition class="mt-1 space-y-1 pl-4">
                                <a href="/usuarios" class="{{ request()->is('usuarios*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Usuarios</a>
                                <a href="/perfiles" class="{{ request()->is('perfiles*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Perfiles</a>
                                <a href="/permisos" class="{{ request()->is('permisos*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Permisos</a>
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
    </div>

    <div class="px-6 py-4 text-sm text-[#93c5fd]">
        © {{ date('Y') }} La Piedad
    </div>
</aside>
