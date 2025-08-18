<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Análisis</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto mt-6 bg-white rounded-lg shadow p-6">
        <a href="{{ route('analisis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition mb-3 inline-block">Nuevo Análisis</a>

        @if(session('success'))
            <div class="text-green-600 mb-3">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Doctor</th>
                    <th class="border px-4 py-2">Tipo Análisis</th>
                    <th class="border px-4 py-2">Método</th>
                    <th class="border px-4 py-2">Muestra</th>
                    <th class="border px-4 py-2">Usuario</th>
                    <th class="border px-4 py-2">Nota</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analisis as $a)
                    <tr>
                        <td class="border px-4 py-2">{{ $a->id }}</td>
                        <td class="border px-4 py-2">{{ $a->cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $a->doctor->nombre }}</td>
                        <td class="border px-4 py-2">{{ $a->tipoAnalisis->nombre }}</td>
                        <td class="border px-4 py-2">{{ $a->tipoMetodo->nombre }}</td>
                        <td class="border px-4 py-2">{{ $a->tipoMuestra->nombre }}</td>
                        <td class="border px-4 py-2">{{ $a->usuarioCreacion->name }}</td>
                        <td class="border px-4 py-2">{{ $a->nota }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('analisis.edit', $a) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('analisis.destroy', $a) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este análisis?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
