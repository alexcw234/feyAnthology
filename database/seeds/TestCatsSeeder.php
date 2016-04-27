<?php

use Illuminate\Database\Seeder;

class TestCatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

              DB::table('categories')->insert([
                'catName' => 'Sample1',
                'description' => 'A sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);

              DB::table('categories')->insert([
                'catName' => 'Sample2',
                'description' => 'A 2nd sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);

              DB::table('categories')->insert([
                'catName' => 'Sample3',
                'description' => 'A 3rd sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);

              DB::table('categories')->insert([
                'catName' => 'Sample4',
                'description' => 'A 4th sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);

              DB::table('categories')->insert([
                'catName' => 'Sample5',
                'description' => 'A 5th sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);

              DB::table('categories')->insert([
                'catName' => 'Sample6',
                'description' => 'A 6th sample description',
                'options' => json_encode(array
                (
                  'public' => 1,
                  'allow_new_contributors' => 1,
                  )
                ),
              ]);
    }
}
