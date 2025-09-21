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

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white rounded-2xl shadow-lg border border-gray-100 p-8 mt-6"
        >   
        @csrf

        <!-- Header interno -->
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-extrabold text-indigo-700">Crear Nuevo Producto</h1>
            <p class="text-gray-500 text-sm mt-2">Ingresa los datos del producto y guarda para continuar.</p>
        </div>

        <div class="mb-6">
            <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-1">Nombre *</label>
            <input type="text" name="nombre" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-6">
            <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
            <textarea name="descripcion" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            rows="3">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-6">
            <label for="precio" class="block text-sm font-semibold text-gray-700 mb-1">Precio *</label>
            <input type="number" step="0.01" name="precio" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
            value="{{ old('precio') }}" required>
        </div>

        <div class="mb-6">
            <label for="stock" class="block text-sm font-semibold text-gray-700 mb-1">Stock</label>
            <input type="number" name="stock" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" value="{{ old('stock', 0) }}">
        </div>

        <div class="mb-6">
            <label for="categoria_producto_id" 
                class="block text-sm font-semibold text-gray-700 mb-1"
            >Categoría *</label>
            <select name="categoria_producto_id" class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"  required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_producto_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="marca_producto_id" 
             class="block text-sm font-semibold text-gray-700 mb-1"
            >Marca</label>
            <select name="marca_producto_id" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" >
                <option value="">-- Sin marca --</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ old('marca_producto_id') == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="path" class="block text-sm font-semibold text-gray-700 mb-1">Imagen</label>
            <input type="file" name="path" 
            class="w-full rounded-lg border-gray-300 shadow-sm px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" >
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

