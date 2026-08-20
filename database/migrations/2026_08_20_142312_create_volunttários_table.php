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
        Schema::create('voluntários', function (Blueprint $table) {
            $table->string('nome');
            $table->id();
            $table->string('telefone');
            $table->string('linkedin');
            $table->string('email');
            $table->string('atepassados_criminais');
            $table->timestamps();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntários');
    }
};
  