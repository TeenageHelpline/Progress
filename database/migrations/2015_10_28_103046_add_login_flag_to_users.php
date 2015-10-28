<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginFlagToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Add a boolean flag that toggles whether a user can login or whether we're just storing their details
         */

        Schema::table('users', function(Blueprint $table ) {
            $table->boolean('login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table) {
           $table->dropColumn('login');
        });
    }
}
