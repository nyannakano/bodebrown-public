@extends('layout')

@section('header')
Mesa
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
        <label for="name">Nome:</label>
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="name" placeholder="Nome da mesa">
        </div>
        <button class="btn btn-primary mb-2 mt-5">Cadastrar</button>
    </form>
@endsection
  