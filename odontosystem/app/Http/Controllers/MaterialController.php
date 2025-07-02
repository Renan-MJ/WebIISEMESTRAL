<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiais = Material::all();
        return view('materiais.index', compact('materiais'));
    }

    public function create()
    {
        return view('materiais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'limite_alerta' => 'required|integer|min:0',
        ]);

        Material::create([
            'nome' => $request->nome,
            'quantidade' => $request->quantidade,
            'limite_alerta' => $request->limite_alerta,
        ]);

        return redirect()->route('materiais.index')->with('success', 'Material adicionado ao estoque.');
    }

    public function show(Material $material)
    {
        return view('materiais.show', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('materiais.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:0',
            'limite_alerta' => 'required|integer|min:0',
        ]);

        $material->update($request->only(['nome', 'quantidade', 'limite_alerta']));

        return redirect()->route('materiais.index')->with('success', 'Material atualizado com sucesso.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiais.index')->with('success', 'Material removido do estoque.');
    }
}