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
        Schema::dropIfExists('user_videojuego');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('user_videojuego', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('videojuego_id')->constrained();
            $table->primary(['user_id', 'videojuego_id']);
            $table->index('videojuego_id');
            $table->timestamps();
        });
    }
};
