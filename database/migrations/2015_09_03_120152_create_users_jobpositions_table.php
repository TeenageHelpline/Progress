<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersJobpositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Pivot table to link job positions and people together. This means that
        // each person may hold more than one job position.
        Schema::create('users_job_positions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('job_position_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the people_job_positions pivot table
        Schema::drop('users_job_positions');
    }
}
