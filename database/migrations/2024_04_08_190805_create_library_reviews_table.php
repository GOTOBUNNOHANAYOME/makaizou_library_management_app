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
        Schema::create('library_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('library_history_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('library_id')->constrained();
            $table->string('comment');
            $table->integer('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_reviews');
    }
};
