<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-100">Tipos de Muestra</h2>
    </x-slot>


    <div class="mb-4">
        <a href="{{ route('tipo_muestra.create') }}"
        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
            + Nuevo Tipo Muestra
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
            <tbody>
                @foreach($muestras as $muestra)
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $muestra->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">{{ $muestra->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-700">
                            <a href="{{ route('tipo_muestra.edit', $muestra) }}" 
                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                            Editar</a>
                            <form action="{{ route('tipo_muestra.destroy', $muestra) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    onclick="return confirm('¿Seguro que deseas eliminar este tipo de muestra?')" 
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
