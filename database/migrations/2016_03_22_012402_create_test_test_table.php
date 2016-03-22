<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('test', function(Blueprint $table)
       {
           $table->engine = "InnoDB";

           $table->increments('id');
           $table->uuid('public_uid');
           $table->uuid('private_uid');

           $table->softDeletes();
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
        //
        Schema::drop('test');
    }
}
