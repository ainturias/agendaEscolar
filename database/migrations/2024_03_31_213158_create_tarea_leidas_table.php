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
        Schema::create('tarea_leidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tareaId');
            $table->foreignId('userId');
            $table->boolean('leido')->default(false);
            $table->foreign('tareaId')->references('id')->on('tareas');
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_leidas');
    }
};
