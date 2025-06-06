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
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('livro_id')->references('id')->on('livro')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('user')->onDelete('cascade');
            $table->integer('nota')->check('nota >= 0 AND nota <= 5');
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
