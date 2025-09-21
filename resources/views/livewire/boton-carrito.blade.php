<!-- Botón carrito -->
<div class="relative">
    <button wire:click="abrirCarrito" class="text-gray-700 hover:text-cyan-600 focus:outline-none">
        <!-- Icono carrito -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-9V6a2 2 0 10-4 0v7"/>
        </svg>
    </button>
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">
            {{ $carritoTotal }}
        </span>
</div>