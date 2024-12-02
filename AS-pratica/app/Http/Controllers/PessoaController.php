<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    public function create()
    {
        Gate::authorize('create', Pessoa::class);

        return view('pessoas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required'
            
        ]);

        $pessoa = new pessoa();
        $pessoa->nome = $request->nome;
        $pessoa->idade = $request->idade;
        $pessoa->save();

        return redirect('pessoas')->with('success', 'Pessoa created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', Pessoa::class);

        $pessoa = pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->all());
        $pessoa->nome = $request->nome;
        $pessoa->idade = $request->idade;
        $pessoa->save();

        return redirect('pessoas')->with('success', 'Pessoa updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Pessoa::class);

        $pessoa = pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect('pessoas')->with('success', 'Pessoa deleted successfully.');
    }
}
