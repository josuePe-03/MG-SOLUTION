<div class="bg-white w-full shadow-lg rounded-lg overflow-hidden p-2">

    <div class="mb-4 flex items-center space-x-2">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Buscar hemograma..." 
               class="border px-2 py-1 rounded focus:outline-none focus:ring-2 focus:ring-sky-500 w-full md:w-64">
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-sky-700 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Categoría</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Unidad</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Referencia</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($hemogramas as $h)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $h->id }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $h->nombre }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $h->categoria->nombre }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $h->unidad->nombre }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $h->referencia }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800 space-x-2">
                        <a href="{{ route('hemograma_completo.edit', $h) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">Editar</a>
                        <form action="{{ route('hemograma_completo.destroy', $h) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este hemograma?')"
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-3 text-center text-gray-500">No se encontraron hemogramas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $hemogramas->links() }}
    </div>
</div>
