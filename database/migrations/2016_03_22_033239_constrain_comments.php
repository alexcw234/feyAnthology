<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstrainComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        Schema::table('comments',function($table)
        {

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
        Schema::table('comments', function ($table) {

        $table->dropForeign('comments_userid_foreign');
        $table->dropForeign('comments_workid_foreign');
      });
    }
}
