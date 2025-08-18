<?php

namespace App\Http\Controllers;

use App\Models\TipoAnalisis;
use Illuminate\Http\Request;

class TipoAnalisisController extends Controller
{
    public function index()
    {
        $tipos = TipoAnalisis::all();
        return view('tipo_analisis.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipo_analisis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:tipo_analisis,nombre',
        ]);

        TipoAnalisis::create($request->all());

        return redirect()->route('tipo_analisis.index')->with('success', 'Tipo de análisis creado correctamente');
    }

    public function edit(TipoAnalisis $tipoAnalisis)
    {
        return view('tipo_analisis.edit', compact('tipoAnalisis'));
    }

    public function update(Request $request, TipoAnalisis $tipoAnalisis)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:tipo_analisis,nombre,' . $tipoAnalisis->id,
        ]);

        $tipoAnalisis->update($request->all());

        return redirect()->route('tipo_analisis.index')->with('success', 'Tipo de análisis actualizado correctamente');
    }

    public function destroy(TipoAnalisis $tipoAnalisis)
    {
        $tipoAnalisis->delete();
        return redirect()->route('tipo_analisis.index')->with('success', 'Tipo de análisis eliminado correctamente');
    }
}
