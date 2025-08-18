<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Métodos</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white rounded-lg shadow p-6">
        <a href="{{ route('tipo_metodo.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-3 inline-block">Nuevo Método</a>

        @if(session('success'))
            <div class="text-green-600 mb-3">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($metodos as $metodo)
                    <tr>
                        <td class="border px-4 py-2">{{ $metodo->id }}</td>
                        <td class="border px-4 py-2">{{ $metodo->nombre }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('tipo_metodo.edit', $metodo) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('tipo_metodo.destroy', $metodo) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este método?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
