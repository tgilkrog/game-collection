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
        Schema::create('game_bases', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->year('release_year')->nullable();
            $table->string('publisher')->nullable();
            $table->string('developer')->nullable();
            $table->string('description')->nullable();
            $table->string('cover_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_bases');
    }
};
