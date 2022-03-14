@extends('App.HeaderApp')
@section('title', 'Minha Conta')
@section('contend')
  <div class="conteiner" style="text-align: center;width:80%;margin:auto;">
    <h2>Informações do Usuario </h2>

    <a href="/user/profile">
      <button class="buttonConfig">Configuração da Conta</button>
    </a> 

    @forelse($Address->slice(0, 1) as $value)
    <h2 style="margin-top: 20px;">Endereços Cadastrados</h2>
      
      @foreach($Address as $value)
        <table class="table table-bordered" id="table1">
          <tr>
            <td rowspan="2">{{ $value->unidade }}</td>
            <td>{{ $value->logradouro }}</td>
            <td>{{ $value->bairro }}</td>
          </tr>
          <tr>
            <td>{{ $value->localidade }}</td>
            <td>{{ $value->cel }}</td>
          </tr>
        </table>
      @endforeach
    @empty
    @endforelse

    <form class="form" method="POST" action="createaddress">
      @csrf
      <h3>Cadastrar novo Endereço</h3>
      <input name="unidade" require placeholder="Ex: Casa,Apartamento e o Nº" type="text" class="InputForm">
      <input name="cel" require placeholder="Telefone: " type="text" class="InputForm">
      <input name="cep" placeholder="Cep Ex:29154724 somente números" require id="cep" type="text" class="InputForm">
      <input name="logradouro" require placeholder="Rua" id="logradouro" type="text" class="InputForm">
      <input name="bairro" require placeholder="Bairro" id="bairro" type="text" class="InputForm">
      <input name="localidade" require placeholder="Municipio" id="localidade" type="text" class="InputForm">
      <input name="uf" require placeholder="Estado" id="uf" type="text" class="InputForm">
      <button class="buttonSave" type="submit">Salvar Endereço</button>
    </form>
    <script src="js/BuscaCep.js"></script>
    <form class="form" method="POST" action="{{ route('logout') }}">
      @csrf
      <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
        <button class="buttonSair" >Sair</button>
      </x-jet-dropdown-link>
    </form>
  </div>
@endsection