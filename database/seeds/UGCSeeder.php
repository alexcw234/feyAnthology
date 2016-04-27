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

      //1superadmin, global
      DB::table('usersgroupscats')->insert([

        'userID' => 1,
        'catID' => 1,
        'groupID' => 7,

      ]);

    }
}
