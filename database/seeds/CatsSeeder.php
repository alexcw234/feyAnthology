<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'catName' => 'Default',
        'description' => 'Default',
        'options' => json_encode(array
        (
          'type' => 'None',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Stories',
        'description' => 'Stories about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Story',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);
      
      DB::table('categories')->insert([
        'catName' => 'Art',
        'description' => 'Art about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Art',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);
      DB::table('categories')->insert([
        'catName' => 'Blogs',
        'description' => 'Blogs about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Blog',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);
      DB::table('categories')->insert([
        'catName' => 'Websites',
        'description' => 'Websites about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Website',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Videos',
        'description' => 'Videos about this stuff',
        'options' => json_encode(array
        (
          'type' => 'Video',
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);


    }
}




 ?>
