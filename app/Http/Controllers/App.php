<?php
namespace App\Http\Controllers;
use Auth;
use App\Models\Products;
use App\Models\Pedidos;
use App\Models\Productscars;
use App\Models\Category;
use App\Models\Address;
use Illuminate\Http\Request;

class App extends Controller
{
    public function AppHome(){
        if($Pedido = Pedidos::where('id_user',auth()->user()->id)->where('status_pedido', 'Aberto')->count()){
           $Pedido = Pedidos::where('id_user', auth()->user()->id)->where('status_pedido', 'Aberto')->get();
            foreach ($Pedido as $value) {$id = $value['id'];}
            $Produtos = Productscars::where('id_pedido', $id)->get();
            $PedidosCliente = Pedidos::where('id_user',auth()->user()->id)->orderBy('id','DESC')->get();
            $total = $Produtos->sum('valor_product');
            //return view('AppPedidos',['Produtos'=>$Produtos,'Pedido'=>$id,'total'=>$total, 'PedidoCliente'=>$PedidosCliente]);  
        }
        else
        {
            $cadastro = new Pedidos();
            $cadastro->id_user = auth()->user()->id;
            $cadastro->name_user = auth()->user()->name;
            $cadastro->email_user = auth()->user()->email;
            $cadastro->status_pedido = 'Aberto';
            $cadastro->time = date('H:i:s');
            $cadastro->date = date('d/m/Y');
            $cadastro->day = date('d');
            $cadastro->month = date('m');
            $cadastro->qt = '1';
            $cadastro->save();
            //Pedido Criado com Sucesso
        }
        $Produtos = Products::All();
        $Category = Category::All();
        $Pedido = Pedidos::where('id_user', auth()->user()->id)->where('status_pedido', 'Aberto')->get();
        foreach ($Pedido as $value) {$id = $value['id'];}
        return view('AppHome',['Produtos'=>$Produtos,'Pedido'=>$id,'Category'=>$Category]);
    }   
    public function AppProdutos(){
        $Produtos = Products::All();
        $Category = Category::All();
        $Pedido = Pedidos::where('id_user', auth()->user()->id)->where('status_pedido', 'Aberto')->get();
        foreach ($Pedido as $value) {$id = $value['id'];}
        return view('AppProdutos',['Produtos'=>$Produtos,'Pedido'=>$id,'Category'=>$Category]);
    }
    public function AppPedidos(){
        //Ce existir Pedido com Status Aberto 
        if($Pedido = Pedidos::where('id_user',auth()->user()->id)->where('status_pedido', 'Aberto')->count()){
            
            //Pedido Encontrado
            $Pedido = Pedidos::where('id_user', auth()->user()->id)->where('status_pedido', 'Aberto')->get();
            foreach ($Pedido as $value) {$id = $value['id'];}
            
            //Faz Select em todos os Produtos do Carrinho 
            $Produtos = Productscars::where('id_pedido', $id)->get();

            //Exibe todos os Pedidos do Usuario
            $PedidosCliente = Pedidos::where('id_user',auth()->user()->id)->orderBy('id','DESC')->get();

            //Faz a Soma de Todos os Produtos no Pedido
            $total = $Produtos->sum('valor_product');

            $Address = Address::where('id_user',auth()->user()->id)->get();

            return view('AppPedidos',['Address'=>$Address,'Produtos'=>$Produtos,'Pedido'=>$id,'total'=>$total, 'PedidoCliente'=>$PedidosCliente]);  
        }
            else
        {
        //Cria um Novo Pedido
        $cadastro = new Pedidos();
        $cadastro->id_user = auth()->user()->id;
        $cadastro->name_user = auth()->user()->name;
        $cadastro->email_user = auth()->user()->email;
        $cadastro->status_pedido = 'Aberto';
        $cadastro->time = date('H:i:s');
        $cadastro->date = date('d/m/Y');
        $cadastro->day = date('d');
        $cadastro->month = date('m');
        $cadastro->qt = '1';
        $cadastro->save();
        //Pedido Criado com Sucesso
        return redirect('/pedidos');
        }
        
    }
    public function AppConta(){
        $Produtos = Products::All();
        $Address = Address::where('id_user', auth()->user()->id)->get();
        return view('AppConta',['Produtos'=>$Produtos,'Address'=>$Address]);
    }
    public function AppUser(){
        return view('dashboard');
    }
}
