<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    // crea la migración
    public function up(): void{
        Schema::create('juegos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('codigo');
            $table->string('nombre');
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('jugadores_minimos')->default(1);
            $table->unsignedInteger('jugadores_maximos')->default(1);
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    // deshace la migración
    public function down(): void{
        Schema::dropIfExists('juegos');
    }
};