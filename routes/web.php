<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ChaveController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ############################### AUTENTICAÇAO ######################################

// Retorna página de login
Route::get('login', [AuthController::class, 'index'])->name('login');
// Faz o login 
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 

//Troca senha usuário
Route::get('trocarSenhaUsuário',[UserController::class,'trocarSenhaUsuario'])->middleware('App\Http\Middleware\Authenticate')->name('trocarSenhaUsuario');
Route::get('storeTrocaSenha',[UserController::class,'storeTrocaSenha'])->middleware('App\Http\Middleware\Authenticate')->name('storeTrocaSenha');
// Retorna página de registro - (PROVISÓRIA, APENAS PARA FAZER TESTES)
Route::get('registration', [AuthController::class, 'registration'])->middleware('App\Http\Middleware\Authenticate')->name('registration');
Route::get('/custom-registration', [AuthController::class, 'customRegistration'])->name('register'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

// Retorna página de primeiro login
Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');
Route::get('custom-firstlogin',[AuthController::class,'customFirstLogin']);

// Logout
Route::get('logout',[AuthController::class,'signOut'])->name('logout')->middleware('App\Http\Middleware\Authenticate');
// ################################ PÁGINAS ###########################################

// Retorna dashboard geral - USUARIO COMUM ou ADMIN
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 

Route::get('usuariopedidos',[UsuarioController::class,'index'])->middleware('App\Http\Middleware\Authenticate')->name('usuariopedidos');

// PÁGINA DE USUÁRIO COMUM

Route::get('pedidosusuariocomum',[PedidoController::class, 'pedidosUsuarioComum'])->middleware('App\Http\Middleware\Authenticate')->name('pedidosusuariocomum');
Route::get('trocarsenhaIndex',[AuthController::class,'trocarSenhaIndex'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhaIndex');
Route::get('trocarsenhastore',[AuthController::class,'trocarSenhaStore'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhastore');

// PÁGINA PÚBLICA

Route::get(" ",[UserController::class, 'indexGuest'])->name('pagina_publica');
Route::get("buscacategoria",[UserController::class,'buscaCategoria'])->name('buscacategoria');

// PEDIDO - ADMIN

// Retorna página de login pré-empréstimo
Route::get('fazerpedido', [PedidoController::class, 'index'])->middleware("App\Http\Middleware\Authenticate")->name('fazerpedido');
// Faz o login pré-pedido e retorna para uma página para completar o empréstimo caso o usuário tenha fornecido informações corretas
Route::get('loginpedido', [PedidoController::class, 'loginPedido'])->middleware("App\Http\Middleware\Authenticate")->name('loginpedido');    
// Registra as informações no banco
Route::get('storepedido/{user_id}', [PedidoController::class, 'store'])->middleware("App\Http\Middleware\Authenticate")->name('storepedido');


// MONITORAMENTO DE CHAVES - ADMIN

Route::get('verchaves',[ChaveController::class,'index'])->middleware("App\Http\Middleware\Authenticate")->name('verchaves');
Route::get('storechave',[ChaveController::class,'store'])->middleware("App\Http\Middleware\Authenticate")->name('storechave');
Route::get('adicionarchave',[ChaveController::class,'indexAdicionar'])->middleware("App\Http\Middleware\Authenticate")->name('adicionarchave');
Route::get('detalhechave',[ChaveController::class,'indexDetalhes'])->middleware("App\Http\Middleware\Authenticate")->name('detalhechave');
Route::get('labscategoria',[ChaveController::class,'labsCategoria'])->middleware("App\Http\Middleware\Authenticate")->name('labscategoria');
// MONITORAMENTO DE USUÁRIOS

Route::get('verusuarios',[UserController::class,'index'])->middleware("App\Http\Middleware\Authenticate")->name('verusuarios');
Route::get('adicionarusuario',[UserController::class,'indexAdicionarUsuario'])->middleware("App\Http\Middleware\Authenticate")->name('adicionarusuario');
Route::get('storeusuario',[UserController::class,'store'])->middleware("App\Http\Middleware\Authenticate")->name('storeusuario');
Route::get('usuariodetalhe',[UserController::class,'indexdetalhes'])->middleware("App\Http\Middleware\Authenticate")->name('detalheusuario');

// MONITORAMENTO DE DEVOLUÇÕES
Route::get('devolucao',[PedidoController::class,'devolucaoIndex'])->middleware("App\Http\Middleware\Authenticate")->name('devolucao');
Route::get('storedevolucao',[PedidoController::class,'storedevolucao'])->middleware("App\Http\Middleware\Authenticate")->name('storedevolucao');

// RELATÓRIOS DE PEDIDOS
Route::get('verpedidos',[PedidoController::class,'pedidosIndex'])->middleware("App\Http\Middleware\Authenticate")->name('verpedidos');

Route::get('pedidosusuario',[PedidoController::class,'pedidosUsuarioIndex'])->middleware("App\Http\Middleware\Authenticate")->name('pedidosusuario');
Route::get('respostausuario',[PedidoController::class,'respondeUsuario'])->middleware("App\Http\Middleware\Authenticate")->name('respostausuario');

Route::get('pedidosperiodo',[PedidoController::class,'pedidosPeriodoIndex'])->middleware("App\Http\Middleware\Authenticate")->name('pedidosperiodo');
Route::get('respostaperiodo',[PedidoController::class,'respondePeriodo'])->middleware("App\Http\Middleware\Authenticate")->name('respostaperiodo');

Route::get('pedidoschave',[PedidoController::class,'pedidosChaveIndex'])->middleware("App\Http\Middleware\Authenticate")->name('pedidoschave');
Route::get('respostachave',[PedidoController::class,'respondeChave'])->middleware("App\Http\Middleware\Authenticate")->name('respostachave');

Route::get('encontraLabs',[PedidoController::class,'encontraLabs'])->middleware("App\Http\Middleware\Authenticate")->name('encontraLabs');
// RELATÓRIO DE PROBLEMAS
Route::get('indexProblemas',[PedidoController::class,'indexProblemas'])->middleware("App\Http\Middleware\Authenticate")->name('indexProblemas');
// Deletar problema
Route::get('deleteProblema/{problema_excluir}',[PedidoController::class,'deleteProblema'])->middleware("App\Http\Middleware\Authenticate")->name('deleteProblema');