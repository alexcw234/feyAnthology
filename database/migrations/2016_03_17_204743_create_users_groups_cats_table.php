<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersGroupsCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usersgroupscats',function(Blueprint $table)
        {
        $table->increments('ugcID');
        $table->integer('userID')->unsigned();
        $table->integer('groupID')->unsigned()->default(6)->nullable();
        $table->integer('catID')->unsigned()->default(1)->nullable();

        $table->timestamps();

  //      $table->foreign('catID')->references('catID')->on('categories');
  //      $table->foreign('groupID')->references('groupID')->on('groups');
  //      $table->foreign('userID')->references('userID')->on('users');

        $table->unique(['userID','catID']);
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
        Schema::dropIfExists('usersgroupscats');
    }
}
