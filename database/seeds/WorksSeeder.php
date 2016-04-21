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
              'Title' => 'Title 1',
              'Author' => 'Author 1',
              'Source' => 'Source 1',
              'Summary' => 'This is a sample summary.',
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
              'Title' => 'Title 2',
              'Author' => 'Author 2',
              'Source' => 'Source 2',
              'Summary' => 'This is a sample summary.',
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
              'Title' => 'Title 3',
              'Author' => 'Author 3',
              'Source' => 'Source 3',
              'Summary' => 'This is a sample summary.',
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
              'Title' => 'Title 4',
              'Author' => 'Author 4',
              'Source' => 'Source 4',
              'Summary' => 'This is a sample summary.',
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
              'Title' => 'Title 5',
              'Author' => 'Author 5',
              'Source' => 'Source 5',
              'Summary' => 'This is a sample summary.',
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
              'Title' => 'Pending Title 1',
              'Author' => 'Pending Author 1',
              'Source' => 'Pending Source 1',
              'Summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => null,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);
        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Pending Title 2',
              'Author' => 'Pending Author 2',
              'Source' => 'Pending Source 2',
              'Summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => null,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);
        DB::table('works')->insert([
          'catID' => 2,
          'typeID' => 1,
          'url' => 'www.google.com',
          'info' => json_encode(array
          (
              'Title' => 'Pending Title 3',
              'Author' => 'Pending Author 3',
              'Source' => 'Pending Source 3',
              'Summary' => 'This is a sample summary.',
          )
        ),
          'tags' => '
            "test1" => "other",
            "test2" => "other",
            "test3" => "other",
            "test4" => "other",
          ',
          'approved' => null,
          'subID' => 2,
          'subDate' => Carbon::now(),
        ]);



    }
}
