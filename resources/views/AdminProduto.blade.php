@extends('App.Admin')
@section('title', 'Produtos Cadastrados')
@section('contend')
<table class="table">
    <tr>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Foto</th>
        <th>Unidade</th>
        <th>Hora</th>
        <th>Data</th>
        <th></th>
    </tr>
    @foreach($Produtos as $value)
    <tr>
        <td>{{ $value->name_product}}</td>
        <td>{{ $value->category_product}}</td>
        <td>R$: {{ $value->valor_product}}</td>
        <td>{{ $value->descricao_product}}</td>
        <td> <img style="width: 80px;" src="/img/produto/{{ $value->img_product1}}" alt="{{ $value->name_product}}"></td>
        <td>{{ $value->metrica}}</td>
        <td>{{ $value->time}}</td> 
        <td>{{ $value->date}}</td>
        <td>
            <form method="post" action="/admin/deleteproduto">
                @csrf
                <input type="hidden" name="id" value="{{ $value->id }}">
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection