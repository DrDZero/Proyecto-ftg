<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    // crea la migración
    public function up(): void{
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->timestamps();
        });
    }
    // deshace la migración
    public function down(): void{
        Schema::dropIfExists('mails');
    }
};