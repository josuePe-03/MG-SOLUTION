<div>
    <div class="mb-4">
        <a href="{{ route('categoria_hemograma_completo.create') }}"
        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
            + Nuevo Categoria Hemograma
        </a>
    </div>

    <div class="bg-white w-fit shadow-lg rounded-lg overflow-x-auto">
        <table class=" border-collapse">
            <thead  class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $categoria->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $categoria->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">
                            <a href="{{ route('categoria_hemograma_completo.edit', $categoria) }}" 
                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                            Editar</a>
                            <form action="{{ route('categoria_hemograma_completo.destroy', $categoria) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')" 
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
