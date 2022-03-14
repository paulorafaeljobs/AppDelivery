@extends('App.HeaderApp')
@section('title', 'Home')
@section('contend')
<!--Inicio Slides-->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="3000">
    <img src="/img/slide/slider1.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
    <img src="/img/slide/slider2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
    <img src="/img/slide/slider3.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="3000">
    <img src="/img/slide/slider4.png" class="d-block w-100" alt="...">
    </div>
</div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<br>
@if(isset(Auth::user()->name))
    <h4 style="text-align: center;">  Bem Vindo {{ Auth::user()->name }}</h4>   
@endif

@foreach($Category as $value)
    <h1 style="text-align: center;">{{ $categoriaProduto = $value->category }}</h1>
        <div class="flexbox">
            @foreach($Produtos as $value)
                @if($value->category_product ==$categoriaProduto)
                <div class="flex">  
                    @if($value->category_product =='Bebidas')
                        <div style="width: 60px;margin:auto;"><img style="height:100px;" src="/img/produto/{{ $value->img_product1}}" alt="{{ $value->name_product}}"></div>
                    @else
                        <div style="width: 130px;margin:auto;"><img style="height: 100px;" src="/img/produto/{{ $value->img_product1}}" alt="{{ $value->name_product}}"></div>
                    @endif
                    <p>{{ $value->name_product}} {{ $value->metrica }}</p>
                    <p><strong>R$: {{ $value->valor_product}}</strong></p>
                    <form action="produtopedido" method="post">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ $value->id}}">
                        <input type="hidden" name="img_product" value="{{ $value->img_product1 }}">
                        <input type="hidden" style="height:50px;width:130px;" name="name_product" value="{{ $value->name_product}} {{ $value->metrica }}">
                        <input type="hidden" name="id_pedido" value="{{$Pedido}}">
                        <input type="hidden" name="valor_product" value="{{ $value->valor_product}}">
                        <button type="submit" style="width: 120px;height:30px;background-color:#F95959;color: white;border:none;">Adcionar</button>
                    </form>
                </div>
                @endif
            @endforeach
        </div>
@endforeach
@endsection