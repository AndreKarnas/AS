@extends('layouts.base')

@section('content')
<form class="max-w-sm mx-auto" action="{{ url('livros/'.$livro->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') 
    <div class="mb-5">
        <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
        <input type="text" name="titulo" id="titulo" value="{{ $livro->titulo }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="autor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Autor</label>
        <input type="text" name="autor" id="autor" value="{{ $livro->autor }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">Atualizar Livro</button>
</form>

@endsection