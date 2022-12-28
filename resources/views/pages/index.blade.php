@extends('layout')

@section('header')

@endsection

@section('content')

    <div class="list-group mt-5">
        <a href="{{ route('cardapios.index') }}" class="list-group-item list-group-item-action">
            Cardápio
        </a>
        <a href="{{ route('produtos.index') }}" class="list-group-item list-group-item-action">
            Produtos
        </a>
        <a href="{{ route('categorias.index') }}" class="list-group-item list-group-item-action">
            Categorias
        </a>
        <a href="{{ route('cardapios.qrcode') }}" class="list-group-item list-group-item-action">
            QRcode do Cardápio
        </a>
    </div>

@endsection
