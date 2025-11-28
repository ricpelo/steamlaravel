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
        Schema::create('logro_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('logro_id')->constrained();
            $table->primary(['user_id', 'logro_id']);
            $table->index('logro_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logro_user');
    }
};
