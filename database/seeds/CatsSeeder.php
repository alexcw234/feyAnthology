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
          'catName' => 'All',
        ]);

        DB::table('categories')->insert([
          'catName' => 'Sample',
        ]);
    }
}




 ?>
