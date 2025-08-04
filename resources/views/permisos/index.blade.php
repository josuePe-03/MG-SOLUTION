<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Permisos</h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('permisos.create') }}" class="bg-green-900 text-white px-4 py-2 rounded hover:bg-green-700">
            + Nuevo permiso
        </a>
    </div>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Descripción</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permisos as $permiso)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $permiso->nombre }}</td>
                        <td class="px-4 py-2">{{ $permiso->descripcion }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('permisos.edit', $permiso) }}" class="text-blue-600 hover:underline">Editar</a>
                            <form action="{{ route('permisos.destroy', $permiso) }}" method="POST" onsubmit="return confirm('¿Eliminar este permiso?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
