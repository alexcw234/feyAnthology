<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([

          'contentType' => 'TEST',
          'expectedFields' =>  '
            "TestField1" => "true",
            "TestField2" => "true",
          ',
        ]);


    }
}
