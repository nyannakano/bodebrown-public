@extends('layout')

@section('header')
Categorias
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    @csrf
    <label for="cat_name" class="textoLaranja">Nome:</label>
    <div class="input-group mb-2">
          <input type="text" class="form-control" name="cat_name" placeholder="Nome da categoria">
    </div>
    <label for="cat_order" class="textoLaranja">Ordem (coloque um número inteiro, o cardápio é ordenado de forma crescente):</label>
    <div class="input-group mb-2">
        <input type="number" class="form-control" name="cat_order" placeholder="Informe um número">
    </div>
    <button class="btn btn-primary mb-2 mt-5">Cadastrar</button>
</form>

@endsection