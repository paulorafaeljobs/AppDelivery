@extends('App.Admin')
@section('title', 'Pedidos')
@section('contend')

@foreach($Pedidos as $value)
<table class="table">
        <tr style="background-color:bisque;height:40px;">
            <td rowspan="3" style="width: 100px;text-align:center;">{{ $idPedido = $value->id }}</td>
            <td colspan="2">{{ $value->email_user }}</td>      
            <td colspan="1">{{ $value->name_user }}</td>
            <td colspan="2">Status do Pedido: {{ $value->status_pedido }}</td>  
        </tr>
        <tr style="background-color:bisque;height:40px;">
            
            <td colspan="2">{{ $value->date }} as {{ $value->time }}</td>
            <td colspan="3" style="display: flex;">
            
                <form action="statuspedido" method="post">
                    @csrf
                    <input type="hidden" name="pedido" value="{{ $idPedido = $value->id }}">
                    <input type="hidden" value="Preparação" name="status_pedido">
                    <button class="pre">Preparação</button>
                </form>

                <form action="statuspedido" method="post">
                    @csrf
                    <input type="hidden" name="pedido" value="{{ $idPedido = $value->id }}">
                    <input type="hidden" value="Saio para Entrega" name="status_pedido">
                    <button class="ent1">Saio Entrega</button>
                </form>

                <form action="statuspedido" method="post">
                    @csrf
                    <input type="hidden" name="pedido" value="{{ $idPedido = $value->id }}">
                    <input type="hidden" value="Pedido Entregue" name="status_pedido">
                    <button class="ent2">Entregue</button>
                </form>

            </td>
            <td colspan="2">Forma de Pagamento: {{ $value->payment }}</td>
        </tr>
        <tr style="background-color:bisque;height:40px;">
            <td colspan="3">{{ $value->address }}</td>
            <td colspan="2">R$: {{ number_format($value->valor_pedido, 2 , ",", ".") }}</td>
        </tr>

        @foreach($ProdutosPedidos as $value)
            @if($value->id_pedido ==$idPedido)
                <tr> 
                    <td style="width: 100px;text-align:center;">{{ $value->id_pedido }}</td>
                    <td><img style="width: 50px;" src="/img/produto/{{ $value->img_product}}" alt="{{ $value->name_product}}"></td>
                    <td>{{ $value->name_product }}</td>
                    <td>{{ $value->date }}</td>
                    <td>{{ $value->time }} </td>
                    <td colspan="2"> R$: {{ number_format($value->valor_product, 2 , ",", ".") }}</td>
                </tr>
            @endif
        @endforeach 
    </table> 
@endforeach  
@endsection