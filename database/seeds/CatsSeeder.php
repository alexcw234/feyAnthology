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
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);

      DB::table('categories')->insert([
        'catName' => 'Stories we found Online',
        'description' => 'A collection of stories that we found online',
        'options' => json_encode(array
        (
          'public' => 1,
          'allow_new_contributors' => 1,
          )
        ),
      ]);


    }
}




 ?>
