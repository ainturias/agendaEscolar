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
        Schema::create('padre_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('padreId');
            $table->foreignId('estudianteId');
            $table->foreign('padreId')->references('idU')->on('padres');
            $table->foreign('estudianteId')->references('idU')->on('estudiantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padre_estudiantes');
    }
};
