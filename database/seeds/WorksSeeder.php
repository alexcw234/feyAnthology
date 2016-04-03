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
              'Title' => 'Sample Title 9',
              'Author' => 'Sample Author 9',
          )
        ),
          'tags' => '
            "test1" => "true",
            "test4" => "true",
            "test3" => "true",
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
              'Title' => 'Sample Title 10',
              'Author' => 'Sample Author 10',
          )
        ),
        'tags' => '
          "test4" => "true",
          "test2" => "true",
          "test3" => "true",
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
              'Title' => 'Sample Title 11',
              'Author' => 'Sample Author 11',
          )
        ),
        'tags' => '
          "test1" => "true",
          "test4" => "true",
          "test5" => "false",
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
              'Title' => 'Sample Title 12',
              'Author' => 'Sample Author 12',
          )
        ),
        'tags' => '
          "test1" => "true",
          "test2" => "true",
          "test3" => "false",
        ',
          'approved' => true,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);

    }
}
