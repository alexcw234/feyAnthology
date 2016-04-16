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
          'groupName' => 'superadmin',
          'level' => 99,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'catadmin',
          'level' => 88,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'moderator',
          'level' => 77,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'contributor+',
          'level' => 66,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'contributor',
          'level' => 55,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'none',
          'level' => 44,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'limited',
          'level' => 33,
        ]);

        DB::table('groups')->insert([
          'groupName' => 'banned',
          'level' => 22,
        ]);

    }
}



 ?>
