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
        Schema::create('question_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('schedule_id');

             //FOREIGN KEY CONSTRAINTS
            $table->foreign('question_id')->references('id')
             ->on('questions')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')
                ->on('schedules')->onDelete('cascade');
                

             //SETTING THE PRIMARY KEYS
            $table->unique(['question_id','schedule_id']);
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
        Schema::dropIfExists('question_schedule');
    }
};
