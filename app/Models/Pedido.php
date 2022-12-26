<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function chave(){
        return $this->belongsTo(Chave::class);
    }

    public function controle(){
        return $this->belongsTo(Controle::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    protected $fillable = [
        'status',
        'outros_materiais',
        'data_inicio' ,
        'data_fim' ,
        'observacoes'
    ];
}
