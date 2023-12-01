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
        Schema::create('metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('periodo');
            $table->unsignedBigInteger('metable_id')->default(0);
            $table->string('metable_type')->default('-');
//            $table->morphs('matable')->defalt(0);
//            $table->morphs('responsavel_meta');
            $table->integer('vendas_meta');
            $table->integer('vendas_atual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
