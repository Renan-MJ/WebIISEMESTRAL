<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use App\Models\Consulta;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    public function index()
    {
        $faturas = Fatura::with('consulta')->get();
        return view('faturas.index', compact('faturas'));
    }

    public function create()
    {
        $consultas = Consulta::all();
        return view('faturas.create', compact('consultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'valor_total' => 'required|numeric|min:0',
            'status_pagamento' => 'nullable|string',
        ]);

        Fatura::create([
            'consulta_id' => $request->consulta_id,
            'valor_total' => $request->valor_total,
            'status_pagamento' => $request->status_pagamento ?? 'pendente',
        ]);

        return redirect()->route('faturas.index')->with('success', 'Fatura criada com sucesso.');
    }

    public function show(Fatura $fatura)
    {
        return view('faturas.show', compact('fatura'));
    }

    public function edit(Fatura $fatura)
    {
        $consultas = Consulta::all();
        return view('faturas.edit', compact('fatura', 'consultas'));
    }

    public function update(Request $request, Fatura $fatura)
    {
        $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'valor_total' => 'required|numeric|min:0',
            'status_pagamento' => 'nullable|string',
        ]);

        $fatura->update($request->only(['consulta_id', 'valor_total', 'status_pagamento']));

        return redirect()->route('faturas.index')->with('success', 'Fatura atualizada com sucesso.');
    }

    public function destroy(Fatura $fatura)
    {
        $fatura->delete();
        return redirect()->route('faturas.index')->with('success', 'Fatura removida.');
    }
}