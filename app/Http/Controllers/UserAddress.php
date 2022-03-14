<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;

class UserAddress extends Controller
{
    public function CreateAddress(Request $request){
        $Address = new Address();
        $Address->id_user = auth()->user()->id;
        $Address->unidade = $request->unidade; 
        $Address->cel = $request->cel; 
        $Address->cep = $request->cep; 
        $Address->logradouro = $request->logradouro; 
        $Address->bairro = $request->bairro; 
        $Address->localidade = $request->localidade; 
        $Address->uf = $request->uf; 
        $Address->save();
        return redirect('/pedidos'); 
    }
}
