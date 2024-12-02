<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        Gate::authorize('create', Empresa::class);

        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        $empresa = new Empresa();
        $empresa->nome = $request->nome;
        $empresa->save();

        return redirect('empresas')->with('success', 'Empresa created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', Empresa::class);

        $empresa = Empresa::findOrFail($id);
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());
        

        $empresa->nome = $request->nome;
        $empresa->save();

        return redirect('empresas')->with('success', 'Empresa updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Empresa::class);

        $Empresa = Empresa::findOrFail($id);
        $Empresa->delete();
        return redirect('empresas')->with('success', 'Empresa deleted successfully.');
    }
}
