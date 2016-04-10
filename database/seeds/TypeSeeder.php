<?php

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  For expected fields, hstore specify as follows
     *    "Field Name" => "length of field (Short, medium, long, box),
     *                    required field (true,false), lock display on form at (top, bottom, none)"
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([

          'contentType' => 'Story',
          'expectedFields' =>  '
            "Source" => "short,true,top",
            "Title" => "short,true,none",
            "Author" => "short,true,none",
            "Summary" => "box,false,bottom",
          ',
        ]);

        DB::table('types')->insert([

          'contentType' => 'Art',
          'expectedFields' =>  '
            "Source" => "short,true,top",
            "Title" => "short,false,none",
            "Artist" => "short,true,none",
            "Description" => "box,false,bottom",
          ',
        ]);

        DB::table('types')->insert([

          'contentType' => 'Blog',
          'expectedFields' =>  '
            "Blog Name" => "short,true,none",
            "Owner" => "short,true,none",
            "Description" => "box,false,bottom",
          ',
        ]);

        DB::table('types')->insert([

          'contentType' => 'Website',
          'expectedFields' =>  '
            "Site Name" => "short,true,none",
            "Owner" => "short,false,none",
            "Description" => "box,false,bottom",
          ',
        ]);

        DB::table('types')->insert([

          'contentType' => 'Video',
          'expectedFields' =>  '
            "Source" => "short,true,top",
            "Title" => "short,true,none",
            "By" => "short,true,none",
            "Description" => "box,false,bottom",
          ',
        ]);



    }
}
