<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comments',function(Blueprint $table)
        {
            $table->increments('commentID');
            $table->integer('workID')->unsigned();
            $table->integer('userID')->unsigned();
            $table->text('comment');
            $table->dateTime('Date');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('workID')->references('workID')->on('works');


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
        Schema::dropIfExists('comments');
    }
}
