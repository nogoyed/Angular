<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('categorie');
            $table->enum('status', ['DISPONIBLE', 'ADOPTE', 'EN_SOIN'])->default('DISPONIBLE');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
