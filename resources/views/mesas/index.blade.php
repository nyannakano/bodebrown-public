@extends('layout')

@section('header')
Mesas
@endsection

@section('content')
@csrf
@if(!empty($mensagem))
    <div class="alert alert-success" role="alert">
      {{ $mensagem }}
    </div>
@endif
    <a href="{{ route('form_cadastro_mesa') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-square"></i> Cadastrar nova mesa</a>
        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Edição</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mesas as $mesa)
              <tr>
                <td>{{ $mesa->name }}</td>
                <td>
                  <div class="btn-group" role="group">            
                    <form action="/mesas/remover/{{ $mesa->id }}" method="post">
                      @csrf
                      @method('DELETE')
                        <button name="remover" id="remover" class="btn btn-danger btn-secondary" onclick="return confirm('Deseja realmente excluir esta mesa?')">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>

                    {{-- Edição de cadastro através de modal do bootstrap --}}
                                                      
                      <button name="editar" id="editar" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#mesa{{ $mesa->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                    
                    {{-- divs para modal de edição --}}
                    <div class="modal fade" id="mesa{{ $mesa->id }}" tabindex="-1" role="dialog" aria-labelledby="mesaLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="mesaLabel">Editando Mesa {{ $mesa->name }}</h5>
                          </div>
                          <form action="/mesas/editar/{{ $mesa->id }}" method="post">
                            @csrf
                          <div class="modal-body">
                            <label for="name" id="name">Nome:</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome da mesa">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </form></div>
                        </div>
                      </div>
                    </div>
                      {{-- fim das divs modal --}}
                

                      <button name="visualizar" id="visualizar" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#qrCode{{ $mesa->id }}">
                        <i class="fas fa-qrcode"></i>
                      </button>
                      
                      {{-- divs para modal do qrcode --}}
                      <div class="modal fade" id="qrCode{{ $mesa->id }}" tabindex="-1" role="dialog" aria-labelledby="qrCodeLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="qrCodeLabel">QRcode da Mesa {{ $mesa->name }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <img src="{{ asset('storage/images/qrcode'.$mesa->name.'.svg') }}" alt="" title="" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- fim das divs modal --}}
                  </div>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>   
@endsection