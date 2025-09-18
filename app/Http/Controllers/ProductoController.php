<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(Producto::with(['categoria', 'marca'])->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:productos,nombre',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'ruta_imagen' => 'nullable|string',
            'categoria_producto_id' => 'required|exists:categorias_productos,id',
            'marca_producto_id' => 'nullable|exists:marcas_productos,id',
        ]);

        $producto = Producto::create($data);

        return response()->json($producto, 201);
    }

    public function show(Producto $producto)
    {
        $producto->load(['categoria', 'marca']);
        return response()->json($producto);
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:productos,nombre,' . $producto->id,
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'ruta_imagen' => 'nullable|string',
            'categoria_producto_id' => 'required|exists:categorias_productos,id',
            'marca_producto_id' => 'nullable|exists:marcas_productos,id',
        ]);

        $producto->update($data);

        return response()->json($producto);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return response()->json(null, 204);
    }
}
