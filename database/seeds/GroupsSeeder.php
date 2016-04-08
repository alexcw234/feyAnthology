<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
          'groupID' => 1,
          'groupName' => 'superadmin',
        ]);

        DB::table('groups')->insert([
          'groupID' => 2,
          'groupName' => 'catadmin',
        ]);

        DB::table('groups')->insert([
          'groupID' => 3,
          'groupName' => 'moderator',
        ]);

        DB::table('groups')->insert([
          'groupID' => 4,
          'groupName' => 'contributor+',
        ]);

        DB::table('groups')->insert([
          'groupID' => 5,
          'groupName' => 'contributor',
        ]);

        DB::table('groups')->insert([
          'groupID' => 6,
          'groupName' => 'none',
        ]);

        DB::table('groups')->insert([
          'groupID' => 7,
          'groupName' => 'limited',
        ]);

        DB::table('groups')->insert([
          'groupID' => 8,
          'groupName' => 'banned',
        ]);

    }
}



 ?>
