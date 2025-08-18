<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Tipos de Muestra</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white rounded-lg shadow p-6">
        <a href="{{ route('tipo_muestra.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-3 inline-block">Nueva Muestra</a>

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
                @foreach($muestras as $muestra)
                    <tr>
                        <td class="border px-4 py-2">{{ $muestra->id }}</td>
                        <td class="border px-4 py-2">{{ $muestra->nombre }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('tipo_muestra.edit', $muestra) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('tipo_muestra.destroy', $muestra) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este tipo de muestra?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
