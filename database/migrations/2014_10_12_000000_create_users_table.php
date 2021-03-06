<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_names');
            $table->string('known_as');
            $table->string('email')->unique();
            $table->string('personal_email');
            $table->string('password', 60);
            $table->string('address1');
            $table->string('address2');
            $table->string('zip');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->date('dob');
            $table->string('personal_telephone', 64);
            $table->string('work_telephone', 64);
            $table->string('gender', 2);
            $table->string('image_path');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
