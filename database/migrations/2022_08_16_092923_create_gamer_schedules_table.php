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
        Schema::create('gamer_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('gamer_id');
            $table->unsignedBigInteger('schedule_id');

             //FOREIGN KEY CONSTRAINTS
            $table->foreign('gamer_id')->references('id')
                ->on('gamers')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')
                ->on('schedules')->onDelete('cascade');    

             //SETTING THE PRIMARY KEYS
            $table->unique(['gamer_id','schedule_id']);
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
        Schema::dropIfExists('gamer_schedules');
    }
};
