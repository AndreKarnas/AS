<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pessoas', [PessoaController::class, 'index']);
Route::get('pessoas/create', [PessoaController::class, 'create']);
Route::post('pessoas', [PessoaController::class, 'store']);
Route::get('pessoas/{id}/edit', [PessoaController::class, 'edit']);
Route::put('pessoas/{id}', [PessoaController::class, 'update']);
Route::delete('pessoas/{id}', [PessoaController::class, 'destroy']);

Route::get('carros', [CarroController::class, 'index']);
Route::get('carros/create', [CarroController::class, 'create']);
Route::post('carros', [CarroController::class, 'store']);
Route::get('carros/{id}/edit', [CarroController::class, 'edit']);
Route::put('carros/{id}', [CarroController::class, 'update']);
Route::delete('carros/{id}', [CarroController::class, 'destroy']);

Route::get('animais', [AnimalController::class, 'index']);
Route::get('animais/create', [AnimalController::class, 'create']);
Route::post('animais', [AnimalController::class, 'store']);
Route::get('animais/{id}/edit', [AnimalController::class, 'edit']);
Route::put('animais/{id}', [AnimalController::class, 'update']);
Route::delete('animais/{id}', [AnimalController::class, 'destroy']);

Route::get('livros', [LivroController::class, 'index']);
Route::get('livros/create', [LivroController::class, 'create']);
Route::post('livros', [LivroController::class, 'store']);
Route::get('livros/{id}/edit', [LivroController::class, 'edit']);
Route::put('livros/{id}', [LivroController::class, 'update']);
Route::delete('livros/{id}', [LivroController::class, 'destroy']);

Route::get('empresas', [EmpresaController::class, 'index']);
Route::get('empresas/create', [EmpresaController::class, 'create']);
Route::post('empresas', [EmpresaController::class, 'store']);
Route::get('empresas/{id}/edit', [EmpresaController::class, 'edit']);
Route::put('empresas/{id}', [EmpresaController::class, 'update']);
Route::delete('empresas/{id}', [EmpresaController::class, 'destroy']);

Route::get('pedidos', [PedidoController::class, 'index']);
Route::get('pedidos/create', [PedidoController::class, 'create']);
Route::post('pedidos', [PedidoController::class, 'store']);
Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit']);
Route::put('pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('pedidos/{id}', [PedidoController::class, 'destroy']);

