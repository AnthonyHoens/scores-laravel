<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained();
            $table->unsignedTinyInteger('games')->nullable();
            $table->unsignedTinyInteger('points')->nullable();
            $table->unsignedTinyInteger('wins')->nullable();
            $table->unsignedTinyInteger('looses')->nullable();
            $table->unsignedTinyInteger('draws')->nullable();
            $table->unsignedTinyInteger('goals_for')->nullable();
            $table->unsignedTinyInteger('goals_against')->nullable();
            $table->tinyInteger('goals_difference')->nullable();
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
        Schema::dropIfExists('team_stats');
    }
}
