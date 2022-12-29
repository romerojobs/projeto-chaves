<?php

namespace App\Http\Controllers;
use App\Models\Chave;
use Illuminate\Http\Request;

class ChaveController extends Controller
{

    public function index(){
        return view('admin.chaves.chaves_admin',['chaves' => Chave::all()]);
    }
    public function indexAdicionar(){
        return view('admin.chaves.adicionarchave');
    }
    public function store(Request $request){
        Chave::create([
            'nomelab' => $request->nomelab,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao
        ]);
    }
}
