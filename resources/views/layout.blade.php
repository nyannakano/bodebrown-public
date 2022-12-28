<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodebrown</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/80b78ce4b7.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="icon" href="{{ asset('img/favicon_2.ico') }}" type="image/x-icon"/>

    <link rel="stylesheet" href="{{ asset('css/bulma.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>
<div class="navbar navbar-fixed-top navbar-default" style="height:100px;">

    <a href="{{ url()->previous() }}">
    <img class="brand" src="{{ asset('img/bodebrownlogo.png') }}" width="150px" height="150px" alt="Logo" />
    </a>
    <h1 class="textoLaranja">@yield('header')</h1>


</div>
<div class="container">

    <div class="conteudo">
        @yield('content')
        {{--     Verificar   Autenticação   --}}
        @guest
            @if(Route::has('login'))
                <div class="text-center text-muted">
                    Administrador? Faça o
                    <a class="badge badge-pill badge-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            @endif
        @else
            <div class="text-center text-danger">
                <strong><a class="text-warning" href="{{ route('home') }}"> {{ Auth::user()->name }}</a></strong>, deseja sair da sua conta?
            <a class="badge badge-pill badge-dark" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               alert('Deseja realizar o Logout?');
               document.getElementById('logout-form').submit();">
                {{ __('Sair') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
        @endguest
    </div>
</div>


</body>


</html>