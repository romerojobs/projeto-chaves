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
            'descricao' => $request->descricao,
            'ativo' => false
        ]);
        session()->flash('mensagemLaboratorio' , 'Chave adicionada com sucesso!');
        return redirect()->route('dashboard');
    }

    public function indexDetalhes(Request $request){
        return view('admin.chaves.detalhechave');
    }
    public function labsCategoria(Request $request){
        return view('admin.chaves.chaves_categoria',['chaves' => Chave::where('categoria',$request->categoria)->get()]);
    }
}
