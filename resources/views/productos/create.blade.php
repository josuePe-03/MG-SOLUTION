<x-app-layout>

<div class="container">
    <h1>Nuevo producto</h1>

    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">← Volver</a>

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

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio *</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}">
        </div>

        <div class="mb-3">
            <label for="categoria_producto_id" class="form-label">Categoría *</label>
            <select name="categoria_producto_id" class="form-select" required>
                <option value="">-- Selecciona una categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_producto_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="marca_producto_id" class="form-label">Marca</label>
            <select name="marca_producto_id" class="form-select">
                <option value="">-- Sin marca --</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ old('marca_producto_id') == $marca->id ? 'selected' : '' }}>
                        {{ $marca->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="path" class="form-label">Imagen</label>
            <input type="file" name="path" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar producto</button>
    </form>
</div>
</x-app-layout>

