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
        Schema::create('livro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('autor_id')->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->foreign('autor_id')->references('id')->on('autor')->onDelete('set null');
            $table->foreign('genero_id')->references('id')->on('genero')->onDelete('cascade');
            $table->string('sinopse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro');
    }
};
