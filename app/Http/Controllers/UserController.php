<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('admin.usuarios.usuarios',['users' => User::all()]);
    }
    public function indexAdicionarUsuario(){
        return view('admin.usuarios.adicionarusuario');
    }

    public function store(Request $request){
        
    }
}
