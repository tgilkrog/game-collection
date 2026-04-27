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
        Schema::table('game_bases', function (Blueprint $table) {
            Schema::table('game_bases', function (Blueprint $table) {
                $table->dropForeign(['platform_id']); // drop foreign key first
                $table->dropColumn('platform_id');    // then drop the column
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_bases', function (Blueprint $table) {
            //
        });
    }
};
