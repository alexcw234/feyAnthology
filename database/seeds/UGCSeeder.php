<?php
use App\UGC;
use Illuminate\Database\Seeder;

class UGCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('usersgroupscats')->insert([

        'userID' => 1,
        'catID' => 1,
        'groupID' => 1,

      ]);

      DB::table('usersgroupscats')->insert([

        'userID' => 1,
        'catID' => 2,
        'groupID' => 1,

      ]);

      DB::table('usersgroupscats')->insert([

        'userID' => 2,
        'catID' => 1,
        'groupID' => 6,

      ]);

      DB::table('usersgroupscats')->insert([

        'userID' => 2,
        'catID' => 2,
        'groupID' => 6,

      ]);


    }
}
