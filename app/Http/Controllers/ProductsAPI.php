<?php
namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsAPI extends Controller
{
    public function ProdutosApi(){
        $Produtos = Products::all(); 
        return response()->json($Produtos,200);
    }
}

