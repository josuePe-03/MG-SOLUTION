<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    public function index()
    {
        return response()->json(CategoriaProducto::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:categorias_productos,nombre',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = CategoriaProducto::create($data);

        return response()->json($categoria, 201);
    }

    public function show(CategoriaProducto $categoriaProducto)
    {
        return response()->json($categoriaProducto);
    }

    public function update(Request $request, CategoriaProducto $categoriaProducto)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:categorias_productos,nombre,' . $categoriaProducto->id,
            'descripcion' => 'nullable|string',
        ]);

        $categoriaProducto->update($data);

        return response()->json($categoriaProducto);
    }

    public function destroy(CategoriaProducto $categoriaProducto)
    {
        $categoriaProducto->delete();

        return response()->json(null, 204);
    }
}
