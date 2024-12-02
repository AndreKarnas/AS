<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pessoas', [PessoaController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pessoa');
Route::get('pessoas/create', [PessoaController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-pessoa');
Route::post('pessoas', [PessoaController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-pessoa');
Route::get('pessoas/{id}/edit', [PessoaController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-pessoa');
Route::put('pessoas/{id}', [PessoaController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-pessoa');
Route::delete('pessoas/{id}', [PessoaController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-pessoa');

Route::get('carros', [CarroController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-carro');
Route::get('carros/create', [CarroController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-carro');
Route::post('carros', [CarroController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-carro');
Route::get('carros/{id}/edit', [CarroController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-carro');
Route::put('carros/{id}', [CarroController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-carro');
Route::delete('carros/{id}', [CarroController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-carro');

Route::get('animais', [AnimalController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-animal');
Route::get('animais/create', [AnimalController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-animal');
Route::post('animais', [AnimalController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-animal');
Route::get('animais/{id}/edit', [AnimalController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-animal');
Route::put('animais/{id}', [AnimalController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-animal');
Route::delete('animais/{id}', [AnimalController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-animal');

Route::get('livros', [LivroController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-livro');
Route::get('livros/create', [LivroController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-livro');
Route::post('livros', [LivroController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-livro');
Route::get('livros/{id}/edit', [LivroController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-livro');
Route::put('livros/{id}', [LivroController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-livro');
Route::delete('livros/{id}', [LivroController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-livro');

Route::get('empresas', [EmpresaController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-empresa');
Route::get('empresas/create', [EmpresaController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-empresa');
Route::post('empresas', [EmpresaController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-empresa');
Route::get('empresas/{id}/edit', [EmpresaController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-empresa');
Route::put('empresas/{id}', [EmpresaController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-empresa');
Route::delete('empresas/{id}', [EmpresaController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-empresa');

Route::get('pedidos', [PedidoController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pedido');
Route::get('pedidos/create', [PedidoController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-pedido');
Route::post('pedidos', [PedidoController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-pedido');
Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-pedido');
Route::put('pedidos/{id}', [PedidoController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-pedido');
Route::delete('pedidos/{id}', [PedidoController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-pedido');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
