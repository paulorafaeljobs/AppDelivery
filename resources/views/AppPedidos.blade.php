@extends('App.HeaderApp')
@section('title', 'Pedidos')
@section('contend')
<div style="text-align: center;"><h1>Pedido {{ $Pedido }}</h1></div>
<table style="width: 100%;">
@foreach($Produtos as $value)
    <tr>
        <th style="text-align:left"><strong>{{ $value->name_product }}</strong></th>
        @if($value->category_product =='Bebidas')
        <td style="width: 60px;" rowspan="3"><img style="margin-right:20px;height:100px;" src="/img/produto/{{ $value->img_product}}"></td>
        @else
        <td style="width: 120px;" rowspan="3"><img style="width: 120px;" src="/img/produto/{{ $value->img_product}}"></td>
        @endif
    </tr>
    <tr><td style="text-align:left">R$: {{ $value->valor_product }}</td></tr>
    <tr>
        <td  style="text-align:left">
            <form action="delproduto" method="post">
                @csrf
                <input type="hidden" value="{{ $value->id }}" name="id">
                <button type="submit" style="width: 120px;height:30px;background-color:#F95959;color:white;border:none;">Apagar</button>
            </form>
        </td>
        <br>
    </tr>
@endforeach
</table>
<table style="border:1px solid red; margin-top:30px; width: 100%;text-align:center">
    <tr>
        <td>Total do Pedido</td>
        <td>R$: {{ number_format($total, 2 , ",", ".") }}</td> 
    </tr>
</table>
<form action="finalizarpedido" method="post">
    @csrf
    <div style="text-align:center;margin-top:20px;">
        <label for="payment">Forma de Pagamento:</label>
        <select name="payment" id="payment" required style="border-radius:20px;background-color:#F95959;color: white;width:120px;height:40px;text-align:center;border:none">
            <option value="Dinheiro">Dinheiro</option>
            <option value="Credito">Credito</option>
            <option value="Debito">Debito</option>
            <option value="PicPay">PicPay</option>
        </select>  
        <br><br>

    @forelse($Address->slice(0, 1) as $value)
        <label for="address">Endereço de entrega:</label>
        <select name="address" id="address" required style="border-radius:20px;background-color:#F95959;color: white;width:120px;height:40px;text-align:center;border:none">
            @foreach($Address as $value)
                <option value="{{$value->unidade}},{{$value->logradouro}},{{$value->bairro}},{{$value->localidade}},{{$value->cel}},{{$value->cep}},{{$value->uf}}">{{ $value->unidade }} , {{ $value->logradouro }} , {{ $value->bairro }} , {{ $value->localidade }} , {{$value->cel}}</option>
            @endforeach
        </select>
        <br><br>
        <input type="hidden" name="pedido" value="{{ $Pedido }}">
        <input type="hidden" name="valor_pedido" value="{{ $total }}">
        <button class="buttonPedido">Finalizar Pedido</button>
    </div> 
</form> 
    @empty
        <p><a href="/conta">Cadastrar novo Endereço</a></p>
    @endforelse
        


<table class="table table-bordered" style="margin-top: 20px;">
    <tr style="text-align: center;"> 
        <th>Pedido</th>          
        <th>Status</th>     
        <th>Valor</th>  
    </tr>
        @foreach($PedidoCliente as $value)
            @if($value->status_pedido !='Aberto')
                <tr> 
                    <td style="text-align: center;" rowspan="2">{{ $value->id }}</td>  
                    <td>{{ $value->status_pedido }}</td> 
                    <td>R$: {{ number_format($value->valor_pedido, 2 , ",", ".") }}</td> 
                </tr>
                <tr>    
                    <td>{{ $value->payment }}</td>  
                    <td>{{ $value->date }}</td>   
                </tr>
            @endif
        @endforeach  
</table>
@endsection



