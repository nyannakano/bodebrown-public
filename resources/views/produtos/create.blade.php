@extends('layout')

@section('header')
Produtos
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
<div class="produtoCriacao">
    <form method="post" enctype="multipart/form-data">
        @csrf
        <label for="pro_name" class="textoLaranja">Nome:</label>
        <div class="input-group mb-2">
            <input type="text" required class="form-control" name="pro_name" placeholder="Nome do produto">
        </div>
        <label for="pro_price" class="textoLaranja">Preço:</label>
        <div class="input-group">
            <div class="input-group-prepend mb-2">
                <span class="input-group-text">R$</span>
                <input required type="number" min="0" value="0.00" step="0.01" class="form-control" name="pro_price">
            </div>
        </div>
        <label for="pro_description" class="textoLaranja">Descrição:</label>
        <div class="input-group mb-2">
            <input required type="text" class="form-control" name="pro_description" placeholder="Descrição do produto">
        </div>
        <label for="categoria" class="textoLaranja">Categoria:</label>
        <div class="input-group mb-2">
            <select required class="custom-select" name="categoria" id="categoria">
                <option selected>Escolha...</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->cat_name }}
                </option>
                @endforeach
            </select>
        </div>
        <label for="pro_image" class="textoLaranja">Imagem:</label>
        <div class="input-group mb-2">
            <label style="width: 100%;">
                <input type="file" class="form-control" id="pro_image" name="pro_image">
            </label>
        </div>
        <button class="btn btn-primary mb-2 mt-3">Cadastrar</button>
    </form>
</div>

@endsection