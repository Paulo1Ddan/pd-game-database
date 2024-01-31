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
/*         Schema::table('genres', function (Blueprint $table) {
            $table->dropColumn('color');
        }); */
        Schema::table('difficulties', function (Blueprint $table) {
            $table->dropColumn('color');
        });
        Schema::table('scores', function (Blueprint $table) {
            $table->dropColumn('color');
        });
        Schema::table('consoles', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
/*         Schema::table('genres', function (Blueprint $table) {
            $table->string('color', 25);
        }); */
        Schema::table('difficulties', function (Blueprint $table) {
            $table->string('color', 25);
        });
        Schema::table('scores', function (Blueprint $table) {
            $table->string('color', 25);
        });
        Schema::table('consoles', function (Blueprint $table) {
            $table->string('color', 25);
        });
    }
};
