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

        //6cat moderator , global
        DB::table('usersgroupscats')->insert([

          'userID' => 2,
          'catID' => 1,
          'groupID' => 7,

        ]);

        //8contributor global
        DB::table('usersgroupscats')->insert([

          'userID' => 3,
          'catID' => 1,
          'groupID' => 7,

        ]);

    }
}
