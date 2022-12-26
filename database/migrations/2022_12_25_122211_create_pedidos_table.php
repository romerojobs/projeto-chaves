<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->foreignId('usuario_id');
            $table->foreignId('chave_id');
            $table->string('outros_materiais');
            $table->string('data_inicio');
            $table->string('data_fim');
            $table->string('observacoes');
            $table->foreignId('controle_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
