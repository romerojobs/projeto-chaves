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
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 

// Retorna página de registro - (PROVISÓRIA, APENAS PARA FAZER TESTES)
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::get('/custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

// Retorna página de primeiro login
Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');
Route::get('custom-firstlogin',[AuthController::class,'customFirstLogin']);

// ################################ PÁGINAS ###########################################

// Retorna dashboard geral - USUARIO COMUM ou ADMIN
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 

Route::get('usuariopedidos',[UsuarioController::class,'index'])->middleware('App\Http\Middleware\Authenticate')->name('usuariopedidos');








// PEDIDO - ADMIN

Route::get('fazerpedido', [PedidoController::class, 'index'])->middleware("App\Http\Middleware\Authenticate")->name('fazerpedido');
Route::get('storepedido', [PedidoController::class, 'store'])->middleware("App\Http\Middleware\Authenticate")->name('storepedido');  

// MONITORAMENTO DE CHAVES - ADMIN

Route::get('verchaves',[ChaveController::class,'index'])->middleware("App\Http\Middleware\Authenticate")->name('verchaves');
Route::get('storechave',[ChaveController::class,'store'])->middleware("App\Http\Middleware\Authenticate")->name('storechave');
Route::get('adicionarchave',[ChaveController::class,'indexAdicionar'])->middleware("App\Http\Middleware\Authenticate")->name('adicionarchave');

// MONITORAMENTO DE USUÁRIOS

Route::get('verusuarios',[UserController::class,'index'])->middleware("App\Http\Middleware\Authenticate")->name('verusuarios');
Route::get('adicionarusuario',[UserController::class,'indexAdicionarUsuario'])->middleware("App\Http\Middleware\Authenticate")->name('adicionarusuario');
Route::get('storeusuario',[UserController::class,'store'])->middleware("App\Http\Middleware\Authenticate")->name('storeusuario');

// MONITORAMENTO DE DEVOLUÇÕES
Route::get('devolucao',[PedidoController::class,'devolucaoIndex'])->middleware("App\Http\Middleware\Authenticate")->name('devolucao');
Route::get('storedevolucao',[PedidoController::class,'storedevolucao'])->middleware("App\Http\Middleware\Authenticate")->name('storedevolucao');

// RELATÓRIOS DE PEDIDOS