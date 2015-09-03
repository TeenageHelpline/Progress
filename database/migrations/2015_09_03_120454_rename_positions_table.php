<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Rename positions table to job_positions to make its purpose clearer
        Schema::rename("positions", "job_positions");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse this change
        Schema::rename("job_positions", "positions");
    }
}
