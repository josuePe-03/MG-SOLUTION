<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-100">Unidades</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('unidades.create') }}" 
        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
        + Nueva Unidad</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-white w-fit shadow-lg rounded-lg overflow-x-auto">
        <table class=" border-collapse">
            <thead class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($unidades as $unidad)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-3 text-sm text-gray-700">{{ $unidad->id }}</td>
                    <td class="px-6 py-3 text-sm text-gray-700">{{ $unidad->nombre }}</td>
                    <td>
                        <a href="{{ route('unidades.edit', $unidad) }}" 
                        class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                        Editar</a>
                        <form action="{{ route('unidades.destroy', $unidad) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button 
                                onclick="return confirm('¿Eliminar?')" 
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
