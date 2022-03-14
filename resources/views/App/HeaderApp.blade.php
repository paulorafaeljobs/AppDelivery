<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/icon/css/all.css" rel="stylesheet">
    <link href="/css/AppHome.css" rel="stylesheet">
    <title>{{ config('app.name') }} @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="global">
    <header>
        <a href="/"><i class="fas fa-home"></i></a>
        <a href="/produtos"><i class="fas fa-hamburger"></i></a>
        <a href="/pedidos"><i class="fas fa-clipboard"></i></a>
        <a href="/conta"><i class="fas fa-user"></i></a>
    </header>
@yield('contend')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 