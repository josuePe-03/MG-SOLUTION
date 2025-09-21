<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\MarcaProducto;

class ProductoController extends Controller
{
    /**
     * Mostrar listado de productos
     */
    public function index()
    {
        $productos = Producto::with(['categoria', 'marca'])->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $categorias = CategoriaProducto::all();
        $marcas = MarcaProducto::all();
        return view('productos.create', compact('categorias', 'marcas'));
    }

    /**
     * Guardar un producto
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:productos,nombre|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categoria_producto_id' => 'required|exists:categorias_productos,id',
            'marca_producto_id' => 'nullable|exists:marcas_productos,id',
        ]);

        // Guardar imagen si existe
        if ($request->hasFile('path')) {
            $validated['path'] = $request->file('path')->store('productos', 'public');
        }

        Producto::create($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Producto $producto)
    {
        $categorias = CategoriaProducto::all();
        $marcas = MarcaProducto::all();
        return view('productos.edit', compact('producto', 'categorias', 'marcas'));
    }

    /**
     * Actualizar producto
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255|unique:productos,nombre,' . $producto->id,
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categoria_producto_id' => 'required|exists:categorias_productos,id',
            'marca_producto_id' => 'nullable|exists:marcas_productos,id',
        ]);

        if ($request->hasFile('path')) {
            $validated['path'] = $request->file('path')->store('productos', 'public');
        }

        $producto->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }


    public function destroy(Producto $producto)
    {
        // Verificar y borrar la imagen en el disco 'public'
        if ($producto->path && Storage::disk('public')->exists($producto->path)) {
            Storage::disk('public')->delete($producto->path);
        }

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto e imagen eliminados correctamente.');
    }
}
