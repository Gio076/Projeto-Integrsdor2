<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disponibilidades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('voluntario_id')
                ->constrained('voluntarios')
                ->cascadeOnDelete();

            $table->foreignId('evento_id')
                ->constrained('eventos')
                ->cascadeOnDelete();

            $table->string('status')->default('disponivel');

            $table->timestamps();

            $table->unique([
                'voluntario_id',
                'evento_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disponibilidades');
    }
};
