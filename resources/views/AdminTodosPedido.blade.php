@extends('App.Admin')
@section('title', 'Pedidos')
@section('contend')

@foreach($Pedidos as $value)
<table style="width: 95%;margin:auto;text-align:left;">
        <tr style="height:40px;">
            <td rowspan="3" style="width: 100px;text-align:center;">{{ $idPedido = $value->id }}</td>
            <td colspan="2">{{ $value->email_user }}</td>      
            <td colspan="1">{{ $value->name_user }}</td>
            <td colspan="2">Status do Pedido: <strong>{{ $value->status_pedido }} </strong></td>  
        </tr>
        <tr style="height:40px;">
            
            <td colspan="2">Data: <strong>{{ $value->date }}</strong></td>
            <td colspan="3" style="display: flex;">Hora: <strong> {{ $value->time }} </strong></td>
            <td colspan="2">Forma de Pagamento: <strong> {{ $value->payment }} </strong></td>
        </tr>
        <tr style="height:40px;">
            <td colspan="3">{{ $value->address }}</td>
            <td colspan="2"> Valor Total do Pedido  <strong>R$: {{ number_format($value->valor_pedido, 2 , ",", ".") }}</strong></td>
        </tr>

        @foreach($ProdutosPedidos as $value)
            @if($value->id_pedido ==$idPedido)
                <tr> 
                    <td style="width: 100px;text-align:center;">{{ $value->id_pedido }}</td>
                    <td><img style="width: 50px;" src="/img/produto/{{ $value->img_product}}" alt="{{ $value->name_product}}"></td>
                    <td>{{ $value->name_product }}</td>
                    <td>{{ $value->date }}  as {{ $value->time }} </td>
                    <td colspan="2"> Valor do Produto R$: {{ number_format($value->valor_product, 2 , ",", ".") }}</td>
                </tr>
            @endif
        @endforeach 
    </table> 
    <hr>
@endforeach  
@endsection