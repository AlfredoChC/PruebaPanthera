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
        Schema::create('pokemoncruds', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable(); // Campo de la imagen, permitimos que sea nulo
            $table->string('nombre');
            $table->string('altura');
            $table->string('peso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemoncruds');
    }
};
