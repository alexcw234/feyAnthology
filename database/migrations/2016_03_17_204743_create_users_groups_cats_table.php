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
        $table->integer('userID')->unsigned();
        $table->integer('groupID')->unsigned();
        $table->integer('catID')->unsigned();

        $table->softDeletes();
        $table->timestamps();

  //      $table->foreign('catID')->references('catID')->on('categories');
  //      $table->foreign('groupID')->references('groupID')->on('groups');
  //      $table->foreign('userID')->references('userID')->on('users');

        $table->primary(['userID','groupID','catID']);
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
