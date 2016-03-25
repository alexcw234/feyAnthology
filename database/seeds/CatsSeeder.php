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
          'catName' => 'Sample',
          'description' => 'A sample description',
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
