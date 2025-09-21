<div>
<!-- Sidebar -->
<div 
    class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg transform transition-transform duration-300 z-50 pb-4
           {{ $mostrarCarrito ? 'translate-x-0' : 'translate-x-full' }}">
    
    <!-- Header -->
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-bold">Carrito</h2>
        <button wire:click="toggleCarrito" class="text-gray-500 hover:text-gray-700">✕</button>
    </div>

    <div class="p-6 overflow-y-auto h-[calc(100%-120px)]">
        @if(count($carrito) > 0)
            <ul>
                @foreach($carrito as $id => $item)
                    <li class="flex justify-between mb-2 items-center">
                        <span>{{ $item['nombre'] }} x {{ $item['cantidad'] }}</span>
                        <div class="flex items-center gap-2">
                            <span>${{ number_format($item['precio'] * $item['cantidad'], 2) }} MXN</span>
                            <button wire:click="eliminarUnidad({{ $id }})"
                                    class="text-red-500 hover:text-red-700 font-bold">
                                &minus;
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

            <p class="mt-4 font-semibold">
                Total: ${{ number_format(collect($carrito)->sum(fn($i) => $i['precio'] * $i['cantidad']), 2) }} MXN
            </p>
        @else
            <p class="text-gray-500">No hay productos en el carrito</p>
        @endif
    </div>

    @if(count($carrito) > 0)
        <div class="p-4 border-t">
            <button wire:click="cotizar"
                class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-semibold">
                Cotizar por WhatsApp
            </button>
        </div>
    @endif
</div>

</div>