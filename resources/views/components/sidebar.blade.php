{{-- Sidebar --}}
<aside :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white flex flex-col justify-between shadow-lg transform md:translate-x-0 transition-transform duration-300 z-50">

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
                    @endif

                    {{-- Dropdown Productos --}}
                    <div x-data="{ productoOpen: {{ request()->is('productos*') 
                        || request()->is('productos*') 
                        || request()->is('producto-marcas*') 
                        || request()->is('producto-categorias*') 
                        ? 'true' : 'false' }} }">

                        <button @click="productoOpen = !productoOpen" 
                            class="w-full text-left px-3 py-2 rounded hover:bg-[#0EA5E9] flex justify-between items-center 
                            {{ request()->is('productos*') 
                            || request()->is('producto-marcas*') 
                            || request()->is('producto-categorias*') 
                             ? 'bg-[#0EA5E9]' : '' }}">
                            
                            <span>Productos</span>
                            <svg :class="{ 'rotate-180': productoOpen }" 
                                class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="productoOpen" x-transition class="mt-1 space-y-1 pl-4">
                            @if (auth()->user()->tienePerfil('Capturista') || auth()->user()->tienePerfil('Administrador'))
                                <a href="/productos" class="{{ request()->is('productos*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Productos</a>
                            @endif
                            @if (auth()->user()->tienePerfil('Administrador'))
                                <a href="/producto-marcas" class="{{ request()->is('producto-marcas*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Analisis</a>
                                <a href="/producto-categorias" class="{{ request()->is('producto-categorias*') ? 'bg-[#0EA5E9]' : '' }} block px-3 py-2 rounded hover:bg-[#0EA5E9]">Tipo De Metodo</a>
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
