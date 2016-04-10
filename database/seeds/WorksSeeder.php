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
        // Standard approved test

        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'title' => 'Title 1',
              'author' => 'Author 1',
              'source' => 'Source 1',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => true,
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
              'title' => 'Title 2',
              'author' => 'Author 2',
              'source' => 'Source 2',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
            "test5" => "other",
          ',
          'approved' => true,
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
              'title' => 'Title 3',
              'author' => 'Author 3',
              'source' => 'Source 3',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test3" => "other",
            "test4" => "other",
            "test5" => "other",
            "test6" => "other",
          ',
          'approved' => true,
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
              'title' => 'Title 4',
              'author' => 'Author 4',
              'source' => 'Source 4',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test4" => "other",
            "test5" => "other",
            "test6" => "other",
            "test7" => "other",
          ',
          'approved' => true,
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
              'title' => 'Title 5',
              'author' => 'Author 5',
              'source' => 'Source 5',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test5" => "other",
            "test6" => "other",
            "test7" => "other",
            "test8" => "other",
          ',
          'approved' => true,
          'subID' => 1,
          'appID' => 1,
          'subDate' => Carbon::now(),
          'appDate' => Carbon::now(),
        ]);

// Test for pending approval
        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'title' => 'Pending Title 1',
              'author' => 'Pending Author 1',
              'source' => 'Pending Source 1',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => false,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);
        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'title' => 'Pending Title 2',
              'author' => 'Pending Author 2',
              'source' => 'Pending Source 2',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => false,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);
        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'title' => 'Pending Title 3',
              'author' => 'Pending Author 3',
              'source' => 'Pending Source 3',
              'summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => false,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);



    }
}
