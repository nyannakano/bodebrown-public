@extends('layout')

@section('header')
    Produtos
@endsection

@section('content')
    @if(!empty($mensagem))
        <div class="alert alert-success" role="alert">
            {{ $mensagem }}
        </div>
    @endif


    <a href="{{ route('form_cadastro_produto') }}" class="btn btn-primary mb-2 mt-2"><i class="fas fa-plus-square"></i>
        Cadastrar Produto</a>

    <table class="table table-hover table-responsive-xl">
        <thead class="thead-dark">
        <tr>
            <th scope="col" style="width: 12%;">Id</th>
            <th scope="col" style="width: 23%;">Nome</th>
            <th scope="col" style="width: 20%;">Preço</th>
            <th scope="col" style="width: 25%;">Categoria</th>
            <th scope="col" style="width: 10%;">Edição</th>
            <th scope="col" style="width: 10%;">Exclusão</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <th>{{ $produto->id }}</th>
                <td>{{ $produto->pro_name }}</td>
                <td>{{ $produto->pro_price }}</td>
                @foreach ($categorias as $categoria) {{-- for each para buscar todos as categorias --}}
                @if($categoria->id == $produto->cat_id) {{-- if para deixar selecionado a categoria atual --}}
                <td>{{ $categoria->cat_name }}</td>
                @endif
                @endforeach

                <td>
                    {{-- Edição de cadastro através de modal do bootstrap --}}
                    <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal"
                            data-target="#produto{{ $produto->id }}">
                        <i class="fas fa-xs fa-edit"></i>
                    </button>
                    {{-- divs para modal de edição --}}
                    <div class="modal fade" id="produto{{ $produto->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="produtoLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="produtoLabel">Editando
                                        produto {{ $produto->pro_name }}</h5>
                                </div>
                                <form action="/produtos/editar/{{ $produto->id }}" enctype="multipart/form-data"
                                      method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="name" id="name">Nome:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="name" id="name"
                                                   placeholder="Nome do produto" value="{{ $produto->pro_name }}">
                                        </div>
                                        <label for="pro_price">Preço:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">R$</span>
                                                <input type="number" min="0" value="{{ $produto->pro_price }}"
                                                       step="0.01" class="form-control" name="pro_price">
                                            </div>
                                        </div>
                                        <label for="pro_description">Descrição:</label>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="pro_description"
                                                   placeholder="Descrição do produto"
                                                   value="{{ $produto->pro_description }}">
                                        </div>
                                        <label for="categoria">Categoria:</label>
                                        <div class="input-group mb-2">
                                            <select class="custom-select" name="categoria" id="categoria">
                                                @foreach ($categorias as $categoria) {{-- for each para buscar todos as categorias --}}
                                                @if($categoria->id == $produto->cat_id) {{-- if para deixar selecionado a categoria atual --}}
                                                <option value="{{ $categoria->id }}" selected>
                                                    {{ $categoria->cat_name }}
                                                </option>
                                                @else
                                                    <option value="{{ $categoria->id }}">
                                                        {{ $categoria->cat_name }}
                                                    </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="pro_image">Imagem:</label>
                                        <div class="input-group mb-2">
                                            @if ($produto->pro_image == null)
                                                <img src="{{asset('storage/proimages/imagemnull.png')}}" class="prodimg"
                                                     alt="">
                                            @else
                                                <img src="{{asset('storage/'.$produto->pro_image)}}" class="prodimg"
                                                     alt="">
                                            @endif
                                        </div>
                                        <div class="form">
                                            <input type="checkbox" id="check" name="check" value="checked">
                                            <label class="check" for="check">Remover Imagem</label>
                                        </div>
                                        <label style="width: 100%;">
                                            <input type="file" class="form-control" id="pro_image" name="pro_image">
                                        </label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar
                                        </button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- fim das divs modal --}}
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <form action="/produtos/remover/{{ $produto->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button name="remover" id="remover" class="btn btn-danger btn-secondary"
                                    onclick="return confirm('Deseja realmente excluir este produto?')">
                                <i class="fas fa-xs fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                    <div class="btn-group" role="group">
                        <form action="/produtos/status/{{ $produto->id }}" method="post">
                            @csrf
                            @if($produto->pro_del === 0)
                                <button name="status" id="status" class="btn btn-dark btn-secondary"
                                        onclick="return confirm('Deseja realmente desativar este produto?')">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            @else
                                <button name="status" id="status" class="btn btn-dark btn-secondary"
                                        onclick="return confirm('Deseja realmente ativar este produto?')">
                                    <i class="fas fa-power-off"></i>
                                </button>
                            @endif
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection