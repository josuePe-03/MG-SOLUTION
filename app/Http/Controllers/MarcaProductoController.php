<?php

namespace App\Http\Controllers;

use App\Models\MarcaProducto;
use Illuminate\Http\Request;

class MarcaProductoController extends Controller
{
    public function index()
    {
        return response()->json(MarcaProducto::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:marcas_productos,nombre',
            'descripcion' => 'nullable|string',
        ]);

        $marca = MarcaProducto::create($data);

        return response()->json($marca, 201);
    }

    public function show(MarcaProducto $marcaProducto)
    {
        return response()->json($marcaProducto);
    }

    public function update(Request $request, MarcaProducto $marcaProducto)
    {
        $data = $request->validate([
            'nombre' => 'required|unique:marcas_productos,nombre,' . $marcaProducto->id,
            'descripcion' => 'nullable|string',
        ]);

        $marcaProducto->update($data);

        return response()->json($marcaProducto);
    }

    public function destroy(MarcaProducto $marcaProducto)
    {
        $marcaProducto->delete();

        return response()->json(null, 204);
    }
}
