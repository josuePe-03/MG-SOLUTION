<div class="grid md:grid-cols-3 gap-8">
    @foreach($productos as $producto)
        <div class="bg-gray-50 rounded-2xl shadow hover:shadow-xl transition overflow-hidden flex flex-col">
            <img src="{{ asset('storage/'.$producto->path) }}" 
                 alt="{{ $producto->nombre }}" 
                 class="h-40 w-full object-contain bg-white">
            <div class="p-6 flex flex-col flex-1">
                <h3 class="text-lg font-semibold text-indigo-700 mb-2">{{ $producto->nombre }}</h3>
                <p class="text-gray-600 mb-4">${{ number_format($producto->precio, 2) }} MXN</p>
                <button wire:click="agregarAlCarrito({{ $producto->id }})"
                        class="mt-auto inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md font-medium text-center">
                    Seleccionar
                </button>
            </div>
        </div>
    @endforeach
</div>

<!-- Mostrar ID seleccionado -->
