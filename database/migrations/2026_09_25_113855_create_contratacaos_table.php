<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contratacoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->constrained('clientes')
                ->cascadeOnDelete();

            $table->foreignId('voluntario_id')
                ->constrained('voluntarios')
                ->cascadeOnDelete();

            $table->foreignId('evento_id')
                ->constrained('eventos')
                ->cascadeOnDelete();

            $table->date('data');

            $table->time('horario');

            $table->string('status')->default('pendente');

            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contratacoes');
    }
};