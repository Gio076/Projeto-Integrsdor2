<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');

            $table->string('imagem')->nullable();

            $table->text('descricao')->nullable();

            $table->date('data');

            $table->time('horario');

            $table->string('local');

            $table->string('endereco');

            $table->text('informacoes_acessibilidade')->nullable();

            $table->unsignedInteger('vagas')->default(0);

            $table->string('status')->default('ativo');

            $table->text('informacoes_adicionais')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};