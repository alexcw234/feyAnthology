<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('works')->insert([
          'catID' => 1,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Sample Title 1',
              'Author' => 'Sample Author 1',
          )
        ),
          'tags' => '
            "Test1" => "true",
            "Test2" => "true",
            "Test3" => "true",
          ',
          'approved' => true,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);


        DB::table('works')->insert([
          'catID' => 1,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Sample Title 2',
              'Author' => 'Sample Author 2',
          )
        ),
        'tags' => '
          "Test1" => "true",
          "Test2" => "true",
          "Test3" => "false",
        ',
          'approved' => true,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);

        DB::table('works')->insert([
          'catID' => 1,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Sample Title 3',
              'Author' => 'Sample Author 3',
          )
        ),
        'tags' => '
          "Test1" => "true",
          "Test2" => "true",
          "Test3" => "false",
        ',
          'approved' => false,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);


        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Sample Title 4',
              'Author' => 'Sample Author 4',
          )
        ),
        'tags' => '
          "Test1" => "true",
          "Test2" => "true",
          "Test3" => "false",
        ',
          'approved' => true,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);

    }
}
