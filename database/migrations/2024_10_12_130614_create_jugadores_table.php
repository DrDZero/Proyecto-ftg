<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    // crea la migración
    public function up(): void{
        Schema::create('jugadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('numero_jugador');
            $table->string('nombre');
            $table->unsignedInteger('puntos')->default(0);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    // deshace la migración
    public function down(): void{
        Schema::dropIfExists('jugadores');
    }
};