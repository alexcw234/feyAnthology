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
          'groupName' => 'admin',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'moderator',
        ]);

        DB::table('groups')->insert([
          'groupName' => 'contributor',
        ]);
    }
}



 ?>
