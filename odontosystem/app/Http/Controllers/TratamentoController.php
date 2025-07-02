<?php

namespace App\Http\Controllers;

use App\Models\Tratamento;
use App\Models\Consulta;
use Illuminate\Http\Request;

class TratamentoController extends Controller
{
    public function index()
    {
        $tratamentos = Tratamento::with('consulta')->get();
        return view('tratamentos.index', compact('tratamentos'));
    }

    public function create()
    {
        $consultas = Consulta::all();
        return view('tratamentos.create', compact('consultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
        ]);

        Tratamento::create([
            'consulta_id' => $request->consulta_id,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);

        return redirect()->route('tratamentos.index')->with('success', 'Tratamento registrado com sucesso.');
    }

    public function show(Tratamento $tratamento)
    {
        return view('tratamentos.show', compact('tratamento'));
    }

    public function edit(Tratamento $tratamento)
    {
        $consultas = Consulta::all();
        return view('tratamentos.edit', compact('tratamento', 'consultas'));
    }

    public function update(Request $request, Tratamento $tratamento)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
        ]);

        $tratamento->update($request->only(['consulta_id', 'descricao', 'valor']));

        return redirect()->route('tratamentos.index')->with('success', 'Tratamento atualizado com sucesso.');
    }

    public function destroy(Tratamento $tratamento)
    {
        $tratamento->delete();
        return redirect()->route('tratamentos.index')->with('success', 'Tratamento removido.');
    }
}
