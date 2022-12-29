<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chave;


class PedidoController extends Controller
{

    public function index(){
        return view("admin.pedidos.emprestimo");
        
    }
    public function store(Request $request){
        $user = User::where('siape',$request->keyusuario)->get()->first();
        $chave = Chave::where('nomelab',$request->nomechave)->get()->first();
        $pedido = Pedido::create([
            "user_id" => $user->id,
            "chave_id" => $chave->id,
            "controle_id" => 1,
            "status" => true,
            "outros_materiais" => $request->material_extra,
            'data_inicio'=> "NÃO SEI" ,
            'data_fim' => "também não sei" ,
            'observacoes' => "sei menos ainda"
        ]);
    }

    public function devolucaoIndex(){
        return view('admin.devolucao.devolucao');
    }

    public function storedevolucao(Request $request){
        $chave = Chave::where('nomelab',$request->nomechave)->get()->first();

        $pedido = Pedido::where('chave_id',$chave->id)
            ->where('status',true)->first();

        $pedido->status = false;
        $pedido->save();
    }
}
