<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Models\Productscars;
use App\Models\Pedidos;

use Illuminate\Http\Request;

class PedidosController extends Controller
{    
    public function AddProdutoPedido(Request $request){
        $cadastro = new Productscars();
        $cadastro->id_pedido = $request->id_pedido; 
        $cadastro->id_product = $request->id_product; 
        $cadastro->name_user = $request->name_user; 
        $cadastro->email_user = $request->email_user; 
        $cadastro->img_product = $request->img_product; 
        $cadastro->name_product = $request->name_product; 
        $cadastro->valor_product = $request->valor_product; 
        $cadastro->time = date('H:i:s'); 
        $cadastro->date = date('d/m/Y');
        $cadastro->day = date('d');
        $cadastro->month = date('m');
        $cadastro->qt = '1';
        $cadastro->save();
        return redirect('/pedidos');
    }
    
    public function StatusPedido(Request $request){
        $Pedido = Pedidos::find($request->pedido);  
        $Pedido->status_pedido = $request->status_pedido;
        $Pedido->time = date('H:i:s'); 
        $Pedido->date = date('d/m/Y');
        $Pedido->day = date('d');
        $Pedido->month = date('m');
        $Pedido->save();
        return redirect('/admin/pedido');
    }

    public function FinalizarPedido(Request $request){
        $Pedido = Pedidos::find($request->pedido);  
        $Pedido->status_pedido = 'Finalizado';  
        $Pedido->address = $request->address;
        $Pedido->valor_pedido = $request->valor_pedido;
        $Pedido->payment = $request->payment;
        $Pedido->time = date('H:i:s'); 
        $Pedido->date = date('d/m/Y');
        $Pedido->day = date('d');
        $Pedido->month = date('m');
        $Pedido->save();
        return redirect('/pedidos');
    }
    public function DelProdutoPedido(Request $request){
        $Produto = Productscars::findOrFail($request->id);
        $Produto->delete();
        return redirect('/pedidos');
    }

}
