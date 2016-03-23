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
        ]);

        DB::table('groups')->insert([
          'groupName' => 'catadmin',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'moderator',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'contributor+',
        ]);      

        DB::table('groups')->insert([
          'groupName' => 'contributor',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'none',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'limited',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'banned',
        ]);

    }
}



 ?>
