@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Opções') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-success" role="alert">
                            Você está logado!
                        </div>
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
                            <a class="list-group-item list-group-item-action" href="{{ route('register') }}">
                                {{ __('Cadastrar novos Usuários') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
