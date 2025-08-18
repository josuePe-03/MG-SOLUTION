<x-app-layout>
    <x-slot name="header">Clientes</x-slot>

    <div class="mb-4">
        <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Cliente</a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->edad }}</td>
                <td>{{ $cliente->sexo }}</td>
                <td>{{ $cliente->activo ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $cliente) }}" class="text-blue-600">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('¿Eliminar?')" class="text-red-600 ml-2">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
