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
              'title' => 'Sample Title 999',
              'author' => 'Sample Author 000',
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


    }
}
