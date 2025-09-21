<x-app-layout>
    <div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay errores en el formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data" 
    class="max-w-lg mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mt-6">
        @csrf
        @method('PUT')

        <!-- Header interno -->
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold text-indigo-700">Editar Nuevo Producto</h1>
            <p class="text-gray-500 text-sm mt-2">Ingresa los datos del producto y guarda para continuar.</p>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                   value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"  rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio *</label>
            <input type="number" step="0.01" name="precio" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                   value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                   value="{{ old('stock', $producto->stock) }}">
        </div>

        <div class="mb-3">
            <label for="categoria_producto_id" class="form-label">Categoría *</label>
            <select name="categoria_producto_id" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"  required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ old('categoria_producto_id', $producto->categoria_producto_id) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="marca_producto_id" class="form-label">Marca</label>
            <select name="marca_producto_id" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" >
                <option value="">-- Sin marca --</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" 
                        {{ old('marca_producto_id', $producto->marca_producto_id) == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="path" class="form-label">Imagen</label><br>
            @if($producto->path)
                <img src="{{ asset('storage/'.$producto->path) }}" width="100" class="mb-2" alt="Imagen actual">
                <br>
            @endif
            <input type="file" name="path"
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" >
            <small class="text-muted">Si seleccionas una nueva imagen, reemplazará la actual.</small>
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('productos.index') }}"
                class="px-5 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                Cancelar
            </a>
            <button type="submit"
                class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-500 text-white rounded-lg font-semibold shadow-md hover:from-blue-700 hover:to-indigo-600 transition">
                Guardar
            </button>
        </div>
    </form>
</div>
</x-app-layout>

