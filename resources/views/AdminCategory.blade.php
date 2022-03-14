@extends('App.Admin')
@section('title', 'Cadastrar Categorias')
@section('contend')
<table class="table">
    <tr>
        <th scope="col">Categoria</th>
        <th scope="col">Data</th>
        <th scope="col">Hora</th>
    </tr>  
    @foreach($Produtos as $value)
    <tr>
        <td>{{ $value->category}}</td>
        <td>{{ $value->date}}</td>
        <td>{{ $value->time}}</td>
        <td>
            <form method="post" action="/admin/deletecategoria">
                @csrf
                <input type="hidden" name="id" value="{{ $value->id }}">
                <button type="submit">Excluir</button>
            </form>
        </td>
    </tr>
    @endforeach    
</table>
<div class="conteiner">
    <form method="post" action="/admin/insertcategoria" style="text-align:center;">
        @csrf
        <input style="width: 400px;" class="inputform" type="text" name="category" placeholder="Categoria">
        <button class="buttonform" type="submit">Cadastrar</button>
    </form>
</div>
@endsection