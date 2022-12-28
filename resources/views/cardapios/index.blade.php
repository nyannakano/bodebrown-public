@extends('layout')

@section('header')
<label class="MenuDiv">Cardápio </label>
@endsection

@section('content')


@foreach ($categorias as $categoria)
<div class="MenuDiv">

    <h1 class="textoLaranja Titulo mt-5">{{ $categoria->cat_name }}</h1>

    @foreach ($produtos as $produto)
    @if ($produto->cat_id == $categoria->id && $produto->pro_del == 0)

    <table class="fixed mb-4">
        <tbody>
        <tr>
            @if (!$produto->pro_image == null)
                <td rowspan="2"><img class="tabelaImg" src="{{ asset('storage/'.$produto->pro_image) }}"
                                 alt="Foto do Produto"></td>
            @else
                <td rowspan="2"><img class="tabelaImg" src="{{ asset('storage/proimages/imagemnull.png') }}"
                                     alt="Foto do Produto"></td>
            @endif
            <td class="textoLaranja tabelaProd">
                <h2 class="tabelaNomeProd" style="margin-left: 20px;">{{ $produto->pro_name }}</h2>
            </td>
            <td class="textoBranco tabelaProd">
                <h2 class="tabelaPrecoProd">R${{ $produto->pro_price }}</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="textoBranco tabelaProd descricao"
                style="padding-left: 20px;">{{ $produto->pro_description }}</td>
        </tr>
    </tbody>

    </table>

    @endif
    @endforeach
@endforeach


</div>
@endsection