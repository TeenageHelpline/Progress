<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderToPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add column
        Schema::table('people', function(Blueprint $table) {
            $table->string('gender', 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove column
        Schema::table('people', function(Blueprint $table) {
            $table->removeColumn('gender');
        });
    }
}
