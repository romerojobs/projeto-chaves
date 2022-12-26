<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

    public function perfil(){
        return $this->belongsTo(Perfil::class);
    }

    protected $fillable = [
            'nome',
            'email',
            'siape' ,
            'telefoneinstitucional' ,
            'cargo' ,
            'setor'
    ];
            
    

}
