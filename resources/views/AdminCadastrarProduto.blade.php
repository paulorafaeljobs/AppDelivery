@extends('App.Admin')
@section('title', 'Cadastrar Produtos')
@section('contend')
<style>
    .file{display: none;}
    .max-width{max-width: 500px;width: 300px;}
    #imgPhoto{width: 150px;cursor: pointer;transition: background .3s;border-radius: 100px;}
</style>
<div class="conteiner">
    <form method="post" enctype="multipart/form-data" action="/admin/insertproduto">
        @csrf
        <label>Nome do Produto:</label>
        <input type="text" name="name_product" required class="inputform">
        <label for="category">Categoria do Produto:</label>
        <select name="category_product" id="category" required class="inputform">
            @foreach($category as $value)
                <option value="{{ $value->category}}">{{ $value->category}}</option>
            @endforeach  
        </select> 
        <label>Imagem do Produto:</label>
        <div class="max-width">
            <div class="imageContainer"><img src="/img/add_img.png" alt="Adicionar Foto" id="imgPhoto"></div>
        </div>
        <input class="file" type="file" id="flImage" name="img_product" accept="image/*">
        


        <label>Valor do Produto:</label>
        <input type="text" name="valor_product" required class="inputform">

        <label>Descrição do Produto</label>
        <input type="text" name="descricao_product" required class="inputform">

        <label>Unidade Metrica:</label>
        <input type="text" name="metrica" required placeholder="Tipo ,Litros,Kg,Caixa" class="inputform">
        <button type="submit" class="buttonform" name="add_product">Cadastrar Produto</button>
    </form>
</div>

<script>
    let photo = document.getElementById('imgPhoto');
    let file = document.getElementById('flImage');
    photo.addEventListener('click', () => {
        file.click();
    });
    file.addEventListener('change', () => {
        if (file.files.length <= 0) {
            return;
        }
        let reader = new FileReader();
        reader.onload = () => {
            photo.src = reader.result;
        }
        reader.readAsDataURL(file.files[0]);
    });
</script>

@endsection
 
