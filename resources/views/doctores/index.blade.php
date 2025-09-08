<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-100">Doctores</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('doctores.create') }}" 
        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
        + Nuevo Cliente</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white w-fit shadow-lg rounded-lg overflow-x-auto">
        <table class=" border-collapse">
            <thead  class="bg-sky-700 text-white">
                <tr class="">
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Activo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctores as $doctor)
                    <tr>
                        <td class="border px-4 py-2">{{ $doctor->id }}</td>
                        <td class="border px-4 py-2">{{ $doctor->nombre }}</td>
                        <td class="border px-4 py-2">{{ $doctor->activo ? 'Sí' : 'No' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('doctores.edit', $doctor) }}" class="text-yellow-600 hover:underline mr-2">Editar</a>
                            <form action="{{ route('doctores.destroy', $doctor) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este doctor?')" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
