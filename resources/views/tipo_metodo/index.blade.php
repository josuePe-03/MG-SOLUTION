<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-100">Métodos</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('tipo_metodo.create') }}"
        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
            + Nuevo Metodo
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white w-fit shadow-lg rounded-lg overflow-x-auto">
        <table class=" border-collapse">
            <thead  class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($metodos as $metodo)
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $metodo->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $metodo->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">
                            <a href="{{ route('tipo_metodo.edit', $metodo) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('tipo_metodo.destroy', $metodo) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('¿Seguro que deseas eliminar este método?')" 
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                    Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
