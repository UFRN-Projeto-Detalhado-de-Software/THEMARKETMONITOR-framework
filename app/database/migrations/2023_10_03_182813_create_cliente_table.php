<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string("nome_completo");
            $table->date("data_de_nascimento");
            $table->string("email");
            $table->string("cpf");
            $table->text("endereco");
            $table->integer("numero");
            $table->text("complemento");
            $table->text("bairro");
            $table->text("cidade");
            $table->text("estado");
            $table->string("cep");
            $table->string("telefone");
            $table->string("genero");
            $table->text("area_de_formacao");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
