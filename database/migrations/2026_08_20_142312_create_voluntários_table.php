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

            $table->string('telefone');
            $table->string('foto')->nullable();
            $table->string('cpf', 14)->unique();
            $table->string('instagram')->nullable();
            $table->date('nascimento');
            $table->string('curriculo')->nullable();
            $table->string('status')->default('disponivel');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voluntarios');
    }
};
  