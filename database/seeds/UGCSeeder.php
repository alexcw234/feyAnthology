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
      //1superadmin, Category 2 to see if modcptable loads correctly
      DB::table('usersgroupscats')->insert([

        'userID' => 1,
        'catID' => 2,
        'groupID' => 3,
        ]);

        //6cat moderator , global
        DB::table('usersgroupscats')->insert([

          'userID' => 2,
          'catID' => 1,
          'groupID' => 7,

        ]);

        //6catmoderator category
        DB::table('usersgroupscats')->insert([

          'userID' => 2,
          'catID' => 2,
          'groupID' => 4,

        ]);

        //8contributor global
        DB::table('usersgroupscats')->insert([

          'userID' => 3,
          'catID' => 1,
          'groupID' => 7,

        ]);

        //8contributor category
        DB::table('usersgroupscats')->insert([

          'userID' => 3,
          'catID' => 2,
          'groupID' => 6,

        ]);

    }
}
