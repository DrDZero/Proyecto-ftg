<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('contadores', function (Blueprint $table) {
            $table->id();
            $table->contadorA;
            $table->contadorB;
            $table->contadA->default=(0);
            $table->contadB->default=(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('contadores');
    }
};
