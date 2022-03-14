<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Productscars;
use App\Models\Products;
use App\Models\Pedidos;
use App\Models\Category;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function PaginaAdmin(){
        //Soma de Pedidos do Dia
        $PedidoDia = Pedidos::where('day', date('d'))->get();
        $TotalPedidoDia = $PedidoDia->sum('qt');

        //Soma de Pedidos no Mês
        $PedidoMes = Pedidos::where('month', date('m'))->get();
        $TotalPedidoMes = $PedidoMes->sum('qt');

        //Soma de venda do Mês
        $VendaMes = Pedidos::where('month', date('m'))->get();
        $TotalVendaMes = $VendaMes->sum('valor_pedido');

        //Soma de venda do Mês
        $VendaDia = Pedidos::where('day', date('d'))->get();
        $TotalVendaDia = $VendaDia->sum('valor_pedido');

        return view('AdminDashboard',['TotalPedidoDia'=>$TotalPedidoDia,'TotalPedidoMes'=>$TotalPedidoMes,'TotalVendaMes'=>$TotalVendaMes,'TotalVendaDia'=>$TotalVendaDia]);
    }
    public function PaginaAdminPedido(){
        $Pedidos = Pedidos::orderBy('id','DESC')->where('status_pedido','!=', 'Aberto')->where('status_pedido','!=', 'Pedido Entregue')->get();
        $ProdutosPedido = Productscars::all();
        return view('AdminPedido',['Pedidos'=>$Pedidos,'ProdutosPedidos'=>$ProdutosPedido]);
    }
    public function PaginaAdminTodosPedido(){
        $Pedidos = Pedidos::orderBy('id','DESC')->where('status_pedido','!=', 'Aberto')->get();
        $ProdutosPedido = Productscars::all();
        return view('AdminTodosPedido',['Pedidos'=>$Pedidos,'ProdutosPedidos'=>$ProdutosPedido]);
    }
    public function PaginaAdminCategory(){
        $Category = Category::All();
        return view('AdminCategory',['Produtos'=>$Category]);
    }
    public function PaginaAdminProdutos(){
        $Produtos = Products::All();
        return view('AdminProduto',['Produtos'=>$Produtos]);
    }    
    public function PaginaAdminCadastrarProdutos(){
        $Category = Category::All();
        return view('AdminCadastrarProduto',['category'=>$Category]);
    }
}
