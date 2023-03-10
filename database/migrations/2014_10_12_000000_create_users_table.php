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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('siape')->unique();

            $table->string('email');
            $table->string('telefonecelular');
            $table->string('cargo');
            $table->string('setor');
            $table->foreignId('perfil_id');

            $table->timestamp('siape_verified_at')->nullable();
            $table->string('password');
            $table->boolean('first_login');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
