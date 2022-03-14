<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\App;
use App\Http\Controllers\UserAddress;

Route::middleware(['auth:sanctum', 'verified'])->get('/new',[ProductsController::class,'NovosProdutoFicticios']);
Route::middleware(['auth:sanctum', 'verified'])->get('/newdel',[ProductsController::class,'DeleteProdutoFicticios']);

Route::middleware(['auth:sanctum', 'verified'])->get('/',[App::class,'AppHome']);
Route::middleware(['auth:sanctum', 'verified'])->get('/produtos',[App::class,'AppProdutos']);
Route::middleware(['auth:sanctum', 'verified'])->get('/pedidos',[App::class,'AppPedidos']);
Route::middleware(['auth:sanctum', 'verified'])->get('/conta',[App::class,'AppConta']);
Route::middleware(['auth:sanctum', 'verified'])->post('/createaddress',[UserAddress::class,'CreateAddress']);

Route::middleware(['auth:sanctum', 'verified'])->post('/produtopedido',[PedidosController::class,'AddProdutoPedido']);
Route::middleware(['auth:sanctum', 'verified'])->post('/finalizarpedido',[PedidosController::class,'FinalizarPedido']);
Route::middleware(['auth:sanctum', 'verified'])->post('/delproduto',[PedidosController::class,'DelProdutoPedido']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[App::class,'AppUser'])->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin',[Admin::class,'PaginaAdmin']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin/pedido',[Admin::class,'PaginaAdminPedido']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin/todospedido',[Admin::class,'PaginaAdminTodosPedido']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin/category',[Admin::class,'PaginaAdminCategory']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin/produtos', [Admin::class,'PaginaAdminProdutos']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->get('/admin/cadastrarproduto', [Admin::class,'PaginaAdminCadastrarProdutos']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->post('/admin/insertproduto',[ProductsController::class,'CadastrarProduto']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->post('/admin/insertcategoria',[ProductsController::class,'CadastrarCategoria']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->post('/admin/deletecategoria',[ProductsController::class,'DeletarCategoria']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->post('/admin/deleteproduto',[ProductsController::class,'DeleteProduto']);
Route::middleware(['auth:sanctum', 'verified','permiss'])->post('/admin/statuspedido',[PedidosController::class,'StatusPedido']);

