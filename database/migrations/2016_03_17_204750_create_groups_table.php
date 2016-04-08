<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groups',function(Blueprint $table)
        {
            $table->integer('groupID');
            $table->string('groupName', 30);
            $table->softDeletes();
            $table->timestamps();

            $table->primary('groupID');
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
        Schema::dropIfExists('groups');
    }
}
