<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cancelamentos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contratacao_id')
                ->constrained('contratacoes')
                ->cascadeOnDelete();

            $table->foreignId('voluntario_id')
                ->constrained('voluntarios')
                ->cascadeOnDelete();

            $table->text('motivo');

            $table->string('status')->default('pendente');

            $table->decimal('penalidade', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cancelamentos');
    }
};