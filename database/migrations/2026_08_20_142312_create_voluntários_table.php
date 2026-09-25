<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('telefone')->nullable();

            $table->string('foto')->nullable();

            $table->text('descricao')->nullable();

            $table->text('habilidades')->nullable();

            $table->text('experiencias')->nullable();

            $table->text('capacitacoes')->nullable();

            $table->string('status')->default('indisponivel');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voluntarios');
    }
};
  