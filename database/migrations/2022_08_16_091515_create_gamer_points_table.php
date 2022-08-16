<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamer_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gamer_id');
            $table->integer('points');
            $table->foreign('gamer_id')->references('id')->on('gamers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamer_points');
    }
};
