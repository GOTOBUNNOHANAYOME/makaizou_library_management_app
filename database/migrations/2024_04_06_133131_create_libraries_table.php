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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('isbn_10')->comment('ISBN10コード');
            $table->string('isbn_13')->comment('ISBN13コード');
            $table->string('title')->comment('タイトル');
            $table->string('description')->comment('概要');
            $table->integer('page')->comment('ページ数');
            $table->string('thumbnail_path')->comment('Googleが提供してる画像');
            $table->string('icon_path')->comment('Googleが提供しているアイコン用の画像');
            $table->string('country')->comment('国');
            $table->string('publisher')->nullable()->comment('発行会社');
            $table->date('published_at')->nullable()->comment('発行日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
