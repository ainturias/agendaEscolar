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
        Schema::create('curso_materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCurso');
            $table->foreignId('idMateria');
            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->foreign('idMateria')->references('id')->on('materias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_materias');
    }
};
