<?php

namespace App\Http\Controllers;

use App\Models\MarcaProducto;
use Illuminate\Http\Request;

class MarcaProductoController extends Controller
{
    public function index()
    {
        $marcas = MarcaProducto::all();
        return view('marcas-productos.index', compact('marcas'));
    }

    public function create()
    {
        return view('marcas-productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:marcas_productos,nombre',
            'descripcion' => 'nullable|string',
        ]);

        MarcaProducto::create($request->only('nombre', 'descripcion'));

        return redirect()->route('marcas-productos.index')->with('success', 'Marca creada.');
    }

    public function edit(MarcaProducto $marcaProducto)
    {
        return view('marcas-productos.edit', compact('marcaProducto'));
    }

    public function update(Request $request, MarcaProducto $marcaProducto)
    {
        $request->validate([
            'nombre' => 'required|unique:marcas_productos,nombre,' . $marcaProducto->id,
            'descripcion' => 'nullable|string',
        ]);

        $marcaProducto->update($request->only('nombre', 'descripcion'));
        
        return redirect()->route('marcas-productos.index')->with('success', 'Marca actualizado.');
    }

    public function destroy(MarcaProducto $marcaProducto)
    {
        $marcaProducto->delete();
        return redirect()->route('marcas-productos.index')->with('success', 'Marca eliminada.');
    }
}
