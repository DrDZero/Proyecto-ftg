<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    // crea la migración
    public function up(): void{
        Schema::create('puntuaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha')->nullable;
            $table->bigInteger('puntuaciones')->default('0');
            $table->timestamps();
        });
    }

    // deshace la migración
    public function down(): void{
        Schema::dropIfExists('puntuaciones');
    }
};