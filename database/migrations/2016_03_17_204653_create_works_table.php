<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('works', function(Blueprint $table)
        {
            $table->increments('workID');
            $table->integer('catID')->unsigned();
            $table->integer('typeID')->unsigned();
            $table->string('url',1000);
            $table->jsonb('info');
            $table->hstore('tags');
            $table->boolean('approved')->nullable();
            $table->integer('subID')->unsigned();
            $table->integer('appID')->unsigned()->nullable();
            $table->dateTime('subDate');
            $table->dateTime('appDate')->nullable();

            $table->softDeletes();
            $table->timestamps();

      //      $table->foreign('catID')->references('catID')->on('categories');
      //      $table->foreign('infoID')->references('infoID')->on('info');
      //      $table->foreign('subID')->references('userID')->on('users');
      //      $table->foreign('appID')->references('userID')->on('users');
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
        Schema::dropIfExists('works');
    }
}
