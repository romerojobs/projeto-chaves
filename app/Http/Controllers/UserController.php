<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pedido;
use Carbon\Carbon;
use App\Models\Chave;
use Illuminate\Support\Facades\Hash;

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

    public function indexGuest(Request $request){
        return view('publico.indexpublico',['pedidos' => Pedido::whereBetween('created_at', [today()->format('d-m-Y'),today()->addDay()])->where('status',true)->get()]);
    }
    
    public function buscaCategoria(Request $request){
        
        $laboratorios_categoria = [];

        foreach (Chave::where('categoria',$request->categoria)->get() as $chave) {
            array_push($laboratorios_categoria,$chave->id);
        }
        return view('publico.busca_categoria',['categoria' => $request->categoria,'pedidos' => Pedido::where('status',true)->whereIn('chave_id',$laboratorios_categoria)->get()]);
    }
    public function trocarSenhaUsuario(){
        return view('admin.usuarios.trocarsenhausuario');
    }
    public function storeTrocaSenha(Request $request){
        
        $request->validate([
            'siape' => 'required|numeric|digits:7',
            'senhanova' => 'required|numeric'
        ],[
            'siape.required' => 'Você precisa digitar o SIAPE!',
            'siape.numeric' => "O SIAPE é composto apenas de números!",
            'siape.digits:7' => "O SIAPE só possui 7 dígitos",
            'senhanova.required' => "Você precisa digitar a senha nova!",
            'senhanova.numeric' => "A senha só é composta de números!"
        ]);
        $user = User::where('siape',$request->siape)->get()->first();
        $user->update([
            'password' => Hash::make($request->senhanova)
        ]);
        session()->flash('mensagemTroca','Senha trocada com sucesso!');
        return redirect()->route('dashboard');
    }  
}
