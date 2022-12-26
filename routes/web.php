<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Autenticador;
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

// Retorna dashboard geral - USUARIO COMUM
Route::get('dashboard', [AuthController::class, 'dashboard']); 

