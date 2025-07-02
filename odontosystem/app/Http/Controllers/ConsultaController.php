<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Dentista;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $dentistas = Dentista::all();

        return view('consultas.create', compact('pacientes', 'dentistas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação simples dos campos
        $request->validate([
            'data' => 'required|date',
            'hora' => 'required',
            'status' => 'required|string',
            'paciente_id' => 'required|exists:pacientes,id',
            'dentista_id' => 'required|exists:dentistas,id',
        ]);

        // Cria a consulta no banco
        Consulta::create($request->all());

        // Redireciona para a lista com mensagem de sucesso
        return redirect()->route('consultas.index')
            ->with('success', 'Consulta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        return view('consultas.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $consulta->update($request->all());
        return redirect()->route('consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
         $consulta->delete();
        return redirect()->route('consultas.index');
    }
}
