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
        Schema::create('works', function(table))
        {
            $table->increments('workID');
            $table->integer('catID')->unsigned();
            $table->integer('infoID')->unsigned();
            $table->string('url',1000);
            $table->boolean('approved');
            $table->integer('subID')->unsigned();
            $table->integer('appID')->unsigned();
            $table->dateTime('subDate');
            $table->dateTime('appDate');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('catID')->references('catID')->on('categories');
            $table->foreign('infoID')->references('infoID')->on('info');
            $table->foreign('subID')->references('userID')->on('users');
            $table->foreign('subID')->references('userID')->on('users');
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
