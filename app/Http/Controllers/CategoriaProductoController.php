<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;

class CategoriaProductoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaProducto::all();
        return view('categorias-productos.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias-productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias_productos,nombre',
            'descripcion' => 'nullable|string',
        ]);

        CategoriaProducto::create($request->only('nombre', 'descripcion'));

        return redirect()->route('categorias-productos.index')->with('success', 'Categoria creada.');
    }

    public function edit(CategoriaProducto $categoriaProducto)
    {
        return view('categorias-productos.edit', compact('categoriaProducto'));
    }

    public function update(Request $request, CategoriaProducto $categoriaProducto)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias_productos,nombre,' . $categoriaProducto->id,
            'descripcion' => 'nullable|string',
        ]);

        $categoriaProducto->update($request->only('nombre', 'descripcion'));
        
        return redirect()->route('categorias-productos.index')->with('success', 'Categoria actualizado.');
    }

    public function destroy(CategoriaProducto $categoriaProducto)
    {
        $categoriaProducto->delete();
        return redirect()->route('categorias-productos.index')->with('success', 'Categoria eliminada.');
    }
}
