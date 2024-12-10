<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('partidas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo');
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->bigInteger('juego')->nullable();
            $table->unsignedInteger('jugadores_partida')->default(2);
            $table->string('comentario')->nullable();
            $table->timestamps();
            $table->foreign('juego_id')->references('id')->on('juegos');
        });
    }
    // deshace la migración
    public function down(): void{
        Schema::dropIfExists('partidas');
    }
};