@extends('layouts.base')

@section('content')
    <form class="max-w-sm mx-auto" action="{{ url('carros/'.$carro->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="{{ $carro->modelo }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="ano" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ano</label>
            <input type="text" name="ano" id="ano" value="{{ $carro->ano }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="pesso_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pessoa</label>
            <select name="pessoa_id" id="pessoa_id" required>
                <option value="">Selecione uma pessoa</option>
                @foreach ($pessoas as $pessoa)
                    @if($pessoa->id === $carro->pessoa->id)
                        <option value="{{ $pessoa->id }}" selected>{{ $pessoa->nome }}</option>
                    @else
                        <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">Atualizar Carro</button>
    </form>

@endsection