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
            $table->boolean('andamento');
            $table->foreignId('usuario_id');
            $table->foreignId('laboratorio_id');
            $table->string('observacao');
            $table->string('data_inicio');
            $table->string('data_fim');
            $table->string('outros_materiais');
            $table->foreignId('controle_id');
            $table->timestamps();
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
