<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        Gate::authorize('create', Livro::class);

        return view('livros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required'
        ]);

        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->save();

        return redirect('livros')->with('success', 'livro created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', Livro::class);

        $livro = Livro::findOrFail($id);
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $livro = livro::findOrFail($id);
        $livro->update($request->all());
        

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->save();

        return redirect('livros')->with('success', 'Livro updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', Livro::class);

        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect('livros')->with('success', 'Livro deleted successfully.');
    }
}
