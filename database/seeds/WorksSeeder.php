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
              'Title' => 'Sample Title 5',
              'Author' => 'Sample Author 5',
          )
        ),
          'tags' => '
            "test1" => "true",
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
              'Title' => 'Sample Title 6',
              'Author' => 'Sample Author 6',
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

        DB::table('works')->insert([
          'catID' => 1,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Sample Title 7',
              'Author' => 'Sample Author 7',
          )
        ),
        'tags' => '
          "test1" => "true",
          "test2" => "true",
          "test3" => "false",
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
              'Title' => 'Sample Title 8',
              'Author' => 'Sample Author 8',
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
