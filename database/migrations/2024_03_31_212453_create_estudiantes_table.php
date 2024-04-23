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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->foreignId('idU')->primary();
            $table->integer('edad')->nullable();
            $table->string('tipo_sanguineo')->nullable();
            $table->text('alergias')->nullable();
            $table->foreignId('idCurso')->nullable();
            $table->foreign('idU')->references('id')->on('users');
            $table->foreign('idCurso')->references('id')->on('cursos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
