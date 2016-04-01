<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstrainWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('works',function($table)
        {

          $table->foreign('catID')->references('catID')->on('categories');
          $table->foreign('typeID')->references('typeID')->on('type');
          $table->foreign('subID')->references('userID')->on('users');
          $table->foreign('appID')->references('userID')->on('users');

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
        Schema::table('works', function ($table) {

        $table->dropForeign('works_catid_foreign');
        $table->dropForeign('works_typeid_foreign');
        $table->dropForeign('works_subid_foreign');
        $table->dropForeign('works_appid_foreign');
      });
    }
}
