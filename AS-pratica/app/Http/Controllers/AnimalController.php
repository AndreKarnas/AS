<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::all();
        return view('animais.index', compact('animais'));
    }

    public function create()
    {
        Gate::authorize('create', Animal::class);
        
        return view('animais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'especie' => 'required'
        ]);

        $animal = new Animal();
        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->save();

        return redirect('animais')->with('success', 'Animal created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', Animal::class);

        $animal = Animal::findOrFail($id);
        return view('animais.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->update($request->all());
        

        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->save();

        return redirect('animais')->with('success', 'Animal updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Animal::class);

        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect('animais')->with('success', 'Animal deleted successfully.');
    }
}
