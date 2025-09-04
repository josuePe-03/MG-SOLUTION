<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Editar Tipo de Análisis</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white rounded-lg shadow p-6">
        <form action="{{ route('tipo_analisis.update', $tipoAnalisis) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombre del tipo de análisis -->
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $tipoAnalisis->nombre) }}" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring" required>
                @error('nombre')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Hemogramas con checkboxes -->
            <div class="mb-3">
                <label class="font-semibold">Hemogramas asociados</label>
                <div class="mt-2 space-y-1">
                    @foreach($hemogramas as $hemograma)
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="hemogramas[]" value="{{ $hemograma->id }}"
                                    {{ in_array($hemograma->id, $tipoAnalisis->hemogramas->pluck('id')->toArray()) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="ml-2">{{ $hemograma->nombre }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Actualizar</button>
            <a href="{{ route('tipo_analisis.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
</x-app-layout>
