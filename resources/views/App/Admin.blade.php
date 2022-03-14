<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&family=Raleway:wght@200;400&family=Reem+Kufi&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&family=Raleway:wght@200;400&family=Reem+Kufi&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/Admin.css">
    <link rel="stylesheet" href="./../css/Admin.css">
    <script src="./../js/MenuMobile.js"></script>
    <script src="js/MenuMobile.js"></script>
    <title>{{ config('app.name') }} @yield('title')</title>
</head>
<body>
    <header class="header1">
        <a class="logo" href="./">{{ config('app.name') }}</a>
        <ul class="menu">
            <li><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></li>
        </ul>
    </header>
    
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>  
        <div class="overlay-content">
            <a href="/admin">Admin</a>
            <a href="/admin/pedido">Pedidos</a>
            <a href="/admin/todospedido">Relatórios Pedidos</a>
            <a href="/admin/produtos">Produtos Cadastrados</a>
            <a href="/admin/category">Cadastrar Categorias</a>
            <a href="/admin/cadastrarproduto">Cadastrar Produtos</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                    {{ __('Sair') }}
                </a>
            </form>
            Laravel Versão {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
    @yield('contend')
