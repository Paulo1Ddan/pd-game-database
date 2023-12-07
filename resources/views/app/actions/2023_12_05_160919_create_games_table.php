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
            $table->unsignedBigInteger('console');
            $table->unsignedBigInteger('main_gender');
            $table->unsignedBigInteger('extra_gender')->nullable();
            $table->unsignedBigInteger('main_type');
            $table->unsignedBigInteger('extra_type')->nullable();
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('score');
            $table->unsignedBigInteger('difficulty');
            $table->text('condition');
            $table->string('cover', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('console')->references('id')->on('users');
            $table->foreign('main_gender')->references('id')->on('genders');
            $table->foreign('extra_gender')->references('id')->on('genders');
            $table->foreign('main_type')->references('id')->on('types');
            $table->foreign('extra_type')->references('id')->on('types');
            $table->foreign('score')->references('id')->on('scores');
            $table->foreign('difficulty')->references('id')->on('difficulties');
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
