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
            $table->increments('userID');
            $table->string('username',50)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->softDeletes();
            $table->timestamps();

            $table->hstore('profile')->nullable();
            $table->integer('globalID')->default(7);


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
