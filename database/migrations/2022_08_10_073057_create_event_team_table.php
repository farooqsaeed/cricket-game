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
        Schema::table('event_team', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('team_id');

            //FOREIGN KEY CONSTRAINTS
            $table->foreign('event_id')->references('id')
                ->on('events')->onDelete('cascade');
            $table->foreign('team_id')->references('id')
                ->on('teams')->onDelete('cascade');
      

            //SETTING THE PRIMARY KEYS
            $table->unique(['event_id','team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_team', function (Blueprint $table) {
            //
        });
    }
};
