@extends('App.Admin')
@section('title', 'Dashboard')
@section('contend')
<div style="display: flex;flex-wrap: wrap;">
    <div style="flex: 1 1 250px;margin-top: 50px;" ><div style="width: 260px;height: 160px;font-size: 30px;text-align: center;margin: 0 auto;background-color: #00cc99;"><p style="padding-top: 20px;text-align: left;margin-left: 30px; font-size: 30px;color: white;">Visitas App</p><p style="font-size: 50px;color: white;">0</p></div></div>
    <div style="flex: 1 1 250px;margin-top: 50px;" ><div style="width: 260px;height: 160px;font-size: 30px;text-align: center;margin: 0 auto;background-color:#33cccc;"><p style="padding-top: 20px;text-align: left;margin-left: 30px; font-size: 30px;color: white;">Pedidos Hoje</p><p style="font-size: 50px;color: white;"> {{ $TotalPedidoDia }} </p></div></div>
    <div style="flex: 1 1 250px;margin-top: 50px;" ><div style="width: 260px;height: 160px;font-size: 30px;text-align: center;margin: 0 auto;background-color: #0099ff;"><p style="padding-top: 20px;text-align: left;margin-left: 30px; font-size: 30px;color: white;">Pedido Mês</p><p style="font-size: 50px;color: white;"> {{ $TotalPedidoMes }} </p></div></div>
    <div style="flex: 1 1 250px;margin-top: 50px;" ><div style="width: 260px;height: 160px;font-size: 30px;text-align: center;margin: 0 auto;background-color:#339966;"><p style="padding-top: 20px;text-align: left;margin-left: 30px; font-size: 30px;color: white;">Vendas Mês</p><p style="font-size: 30px;color: white;">R$: {{ number_format($TotalVendaMes, 2 , ",", ".") }} </p></p></div></div>
    <div style="flex: 1 1 250px;margin-top: 50px;" ><div style="width: 260px;height: 160px;font-size: 30px;text-align: center;margin: 0 auto;background-color:#ff5050;"><p style="padding-top: 20px;text-align: left;margin-left: 30px; font-size: 30px;color: white;">Vendas Hoje</p><p style="font-size: 30px;color: white;">R$: {{ number_format($TotalVendaDia, 2 , ",", ".") }}</p></div></div>
</div>
@endsection