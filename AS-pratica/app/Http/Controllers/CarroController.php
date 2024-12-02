<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        return view('carros.create', compact('pessoas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required',
            'ano' => 'required',
        ]);

        $carro = new Carro();
        $carro->modelo = $request->modelo;
        $carro->ano = $request->ano;
        $carro->pessoa_id = $request->pessoa_id;
        $carro->save();

        return redirect('carros')->with('success', 'Carro created successfully.');
    }

    public function edit($id)
    {
        $carro = Carro::findOrFail($id);
        $pessoas = Pessoa::all();
        return view('carros.edit', compact('carro', 'pessoas'));
    }

    public function update(Request $request, $id)
    {
        $carro = Carro::findOrFail($id);
        $carro->update($request->all());

        $carro->modelo = $request->modelo;
        $carro->ano = $request->ano;
        $carro->save();

        return redirect('carros')->with('success', 'Carro updated successfully.');
    }

    public function destroy($id)
    {
        $carro = Carro::findOrFail($id);
        $carro->delete();
        return redirect('carros')->with('success', 'Carro deleted successfully.');
    }
}
