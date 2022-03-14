@extends('App.HeaderApp')
@section('title', 'Produtos')
@section('contend')
<h3>Produtos</h3>

@foreach($Category as $value)
    <h1 style="text-align: center;">{{ $categoriaProduto = $value->category }}</h1>
        @foreach($Produtos as $value)
            @if($value->category_product ==$categoriaProduto)
            <table style="width: 100%;">
                <tr>
                    <th style="margin-right:20px;text-align:left"><strong> {{ $value->name_product}}  {{ $value->metrica }}</strong></th>
                    @if($value->category_product =='Bebidas')
                        <td style="width: 60px;" rowspan="3"><img style="margin-right:20px;height:100px;" src="/img/produto/{{ $value->img_product1}}" alt="{{ $value->name_product}}"></td>
                    @else
                        <td style="width: 120px;" rowspan="3"><img style="width: 120px;" src="/img/produto/{{ $value->img_product1}}" alt="{{ $value->name_product}}"></td>
                    @endif
                </tr>
                <tr><td style="margin-right:20px;text-align:left"> R$: {{ $value->valor_product}} </td></tr>
                <tr><td  style="text-align:left">
                    <form action="produtopedido" method="post">
                        @csrf
                        <input type="hidden" name="id_product" value="{{ $value->id}}">
                        <input type="hidden" name="img_product" value="{{ $value->img_product1 }}">
                        <input type="hidden" name="name_product" value="{{ $value->name_product}} {{ $value->metrica }}">
                        <input type="hidden" name="id_pedido" value="{{$Pedido}}">
                        <input type="hidden" name="valor_product" value="{{ $value->valor_product}}">
                        <button type="submit" style="border:none;width: 120px;height:30px;background-color:#F95959;color: white;margin-left:20px;">Adcionar</button>
                    </form>
                </td><br></tr>
            </table>
            @endif
        @endforeach
@endforeach
@endsection