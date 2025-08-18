<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Cliente;
use App\Models\Doctor;
use App\Models\TipoAnalisis;
use App\Models\TipoMetodo;
use App\Models\TipoMuestra;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function index()
    {
        $analisis = Analisis::with(['cliente','doctor','tipoAnalisis','tipoMetodo','tipoMuestra','usuarioCreacion'])->get();
        return view('analisis.index', compact('analisis'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $doctores = Doctor::all();
        $tiposAnalisis = TipoAnalisis::all();
        $tiposMetodo = TipoMetodo::all();
        $tiposMuestra = TipoMuestra::all();

        return view('analisis.create', compact('clientes','doctores','tiposAnalisis','tiposMetodo','tiposMuestra'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idDoctor' => 'required|exists:doctores,id',
            'idTipoAnalisis' => 'required|exists:tipo_analisis,id',
            'idTipoMetodo' => 'required|exists:tipo_metodos,id',
            'idTipoMuestra' => 'required|exists:tipo_muestras,id',
            'nota' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['idUsuarioCreacion'] = auth()->id();

        Analisis::create($data);

        return redirect()->route('analisis.index')->with('success', 'Análisis creado correctamente');
    }

    public function edit(Analisis $analisi)
    {
        $clientes = Cliente::all();
        $doctores = Doctor::all();
        $tiposAnalisis = TipoAnalisis::all();
        $tiposMetodo = TipoMetodo::all();
        $tiposMuestra = TipoMuestra::all();

        return view('analisis.edit', compact('analisi','clientes','doctores','tiposAnalisis','tiposMetodo','tiposMuestra'));
    }

    public function update(Request $request, Analisis $analisi)
    {
        $request->validate([
            'idCliente' => 'required|exists:clientes,id',
            'idDoctor' => 'required|exists:doctores,id',
            'idTipoAnalisis' => 'required|exists:tipo_analisis,id',
            'idTipoMetodo' => 'required|exists:tipo_metodos,id',
            'idTipoMuestra' => 'required|exists:tipo_muestras,id',
            'nota' => 'nullable|string',
        ]);

        $analisi->update($request->all());

        return redirect()->route('analisis.index')->with('success', 'Análisis actualizado correctamente');
    }

    public function destroy(Analisis $analisi)
    {
        $analisi->delete();
        return redirect()->route('analisis.index')->with('success', 'Análisis eliminado correctamente');
    }
}
