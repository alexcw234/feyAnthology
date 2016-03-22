<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstrainUsersgroupscats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('usersgroupscats',function($table)
        {

          $table->foreign('catID')->references('catID')->on('categories');
          $table->foreign('groupID')->references('groupID')->on('groups');
          $table->foreign('userID')->references('userID')->on('users');

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
        Schema::table('usersgroupscats', function ($table) {

        $table->dropForeign('usersgroupscats_catid_foreign');
        $table->dropForeign('usersgroupscats_groupid_foreign');
        $table->dropForeign('usersgroupscats_userid_foreign');
      });
    }
}
