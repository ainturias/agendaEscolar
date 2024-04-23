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
        Schema::create('anuncio_leidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId');
            $table->foreignId('anuncioId');
            $table->boolean('leido')->default(false);
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('anuncioId')->references('id')->on('anuncios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncio_leidos');
    }
};
