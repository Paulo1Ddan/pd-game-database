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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 255);
            $table->unsignedBigInteger('console_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('type_id');
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('score_id');
            $table->unsignedBigInteger('difficulty_id');
            $table->text('condition');
            $table->string('cover', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('console_id')->references('id')->on('users');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('score_id')->references('id')->on('scores');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
