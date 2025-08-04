<x-app-layout>
    <x-slot name="header">Unidades</x-slot>

    <div class="mb-4">
        <a href="{{ route('unidades.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nueva Unidad</a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr><th>Nombre</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            @foreach($unidades as $unidad)
            <tr>
                <td class="p-2">{{ $unidad->nombre }}</td>
                <td>
                    <a href="{{ route('unidades.edit', $unidad) }}" class="text-blue-600">Editar</a>
                    <form action="{{ route('unidades.destroy', $unidad) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" class="text-red-600 ml-2">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
