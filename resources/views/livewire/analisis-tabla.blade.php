<div>
    <div class="mb-4">
        <a href="{{ route('analisis.create') }}" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded shadow">
            + Nuevo Analisis   
        </a>
    </div>

    <div class="bg-white w-fit shadow-lg rounded-lg overflow-hidden">
        <table class=" border-collapse">
            <thead  class="bg-sky-700 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Cliente</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Doctor</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tipo Análisis</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Método</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Muestra</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Usuario</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nota</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($analisis as $a)
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->id }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->cliente->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->doctor->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->tipoAnalisis->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->tipoMetodo->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->tipoMuestra->nombre }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->usuarioCreacion->name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">{{ $a->nota }}</td>
                        <td class="px-6 py-3 text-sm text-gray-800">
                            <a href="{{ route('analisis.edit', $a) }}" 
                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                            Editar</a>
                            <form action="{{ route('analisis.destroy', $a) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                 Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
