<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required'
        ]);

        $pedido = new Pedido();
        $pedido->codigo = $request->codigo;
        $pedido->save();

        return redirect('pedidos')->with('success', 'Pedido created successfully.');
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        

        $pedido->codigo = $request->codigo;
        $pedido->save();

        return redirect('pedidos')->with('success', 'Pedido updated successfully.');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect('pedidos')->with('success', 'Pedido deleted successfully.');
    }
}
