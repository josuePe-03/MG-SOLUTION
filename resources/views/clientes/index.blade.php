<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white">Clientes</h2>
    </x-slot>

    <div class="mb-6 flex flex-col md:flex-row justify-between items-center gap-4">
        <h3 class="text-lg font-medium text-gray-700">Listado de Clientes</h3>

        <div class="flex gap-2 items-center w-full md:w-auto">
            <!-- Formulario de búsqueda -->
            <form action="{{ route('clientes.index') }}" method="GET" class="flex w-full md:w-auto">
                <input type="text" name="search" placeholder="Buscar cliente..." 
                       value="{{ request('search') }}"
                       class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500">
                <button type="submit"
                        class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-r-lg font-medium transition">
                    Buscar
                </button>
            </form>

            <!-- Botón de nuevo cliente -->
            <a href="{{ route('clientes.create') }}"
               class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded-lg shadow-md font-semibold transition duration-300">
               + Nuevo Cliente
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-50 border border-green-400 text-green-800 px-4 py-2 rounded-lg mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Edad</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Sexo</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($clientes as $cliente)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $cliente->id }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800 font-medium">{{ $cliente->nombre }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $cliente->edad }}</td>
                    <td class="px-6 py-3 text-sm text-gray-800">{{ $cliente->sexo }}</td>
                    <td class="px-6 py-3 space-x-2">
                        <a href="{{ route('clientes.edit', $cliente) }}" 
                           class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                            Editar
                        </a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-3 text-center text-gray-500">
                        No se encontraron clientes.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $clientes->withQueryString()->links('vendor.pagination.tailwind') }}
    </div>
</x-app-layout>
