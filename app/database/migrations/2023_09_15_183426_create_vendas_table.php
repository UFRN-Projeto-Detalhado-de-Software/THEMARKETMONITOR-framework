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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->string("cliente");
            $table->integer("sdr");
            $table->integer("closer");
            $table->integer("produto");
            $table->date("data");
            $table->float("valor");
            $table->integer("tipo");
            $table->integer("origem");
            $table->integer("meioDePagamento");
            $table->boolean("deTerceiro");
            $table->text("obs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
