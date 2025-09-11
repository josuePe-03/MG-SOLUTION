<div>
    <div class="mb-4">
        <a href="{{ route('usuarios.create') }}" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
            + Nuevo usuario
        </a>
    </div>

    <div class="bg-white w-fit shadow-lg rounded-lg overflow-hidden">
        <table class=" border-collapse">
            <thead  class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($usuarios as $usuario)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $usuario->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $usuario->name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-600">{{ $usuario->email }}</td>
                        <td class="px-6 py-3 flex justify-center gap-3">
                            <a href="{{ route('usuarios.edit', $usuario) }}"
                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                                Editar
                            </a>
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar este usuario?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
