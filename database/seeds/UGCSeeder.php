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


      //2administrator, global
      DB::table('usersgroupscats')->insert([

        'userID' => 2,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //3global archivist, global
      DB::table('usersgroupscats')->insert([

        'userID' => 3,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //4category archivist, global
      DB::table('usersgroupscats')->insert([

        'userID' => 4,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //4category archivist, category
      DB::table('usersgroupscats')->insert([

        'userID' => 4,
        'catID' => 2,
        'groupID' => 3,

      ]);

      //5supermoderator, global
      DB::table('usersgroupscats')->insert([

        'userID' => 5,
        'catID' => 1,
        'groupID' => 7,

      ]);
      //5supermoderator, category
      DB::table('usersgroupscats')->insert([

        'userID' => 5,
        'catID' => 2,
        'groupID' => 7,

      ]);

      //6cat moderator , global
      DB::table('usersgroupscats')->insert([

        'userID' => 6,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //6catmoderator category
      DB::table('usersgroupscats')->insert([

        'userID' => 6,
        'catID' => 2,
        'groupID' => 4,

      ]);

      //7contributorplus global
      DB::table('usersgroupscats')->insert([

        'userID' => 7,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //7contributorplus category
      DB::table('usersgroupscats')->insert([

        'userID' => 7,
        'catID' => 2,
        'groupID' => 5,

      ]);

      //8contributor global
      DB::table('usersgroupscats')->insert([

        'userID' => 8,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //8contributor category
      DB::table('usersgroupscats')->insert([

        'userID' => 8,
        'catID' => 2,
        'groupID' => 6,

      ]);

      //9globallimit global
      DB::table('usersgroupscats')->insert([

        'userID' => 9,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //9globallimit category
      DB::table('usersgroupscats')->insert([

        'userID' => 9,
        'catID' => 2,
        'groupID' => 6,

      ]);

      //10catlimit global
      DB::table('usersgroupscats')->insert([

        'userID' => 10,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //10catlimit category
      DB::table('usersgroupscats')->insert([

        'userID' => 10,
        'catID' => 2,
        'groupID' => 8,

      ]);

      //11globalban global
      DB::table('usersgroupscats')->insert([

        'userID' => 11,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //11globalban category
      DB::table('usersgroupscats')->insert([

        'userID' => 11,
        'catID' => 2,
        'groupID' => 6,

      ]);

      //12catban global
      DB::table('usersgroupscats')->insert([

        'userID' => 12,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //12catban category
      DB::table('usersgroupscats')->insert([

        'userID' => 12,
        'catID' => 2,
        'groupID' => 9,

      ]);

      //13test1 global
      DB::table('usersgroupscats')->insert([

        'userID' => 13,
        'catID' => 1,
        'groupID' => 7,

      ]);

      //14test2 global
      DB::table('usersgroupscats')->insert([

        'userID' => 14,
        'catID' => 1,
        'groupID' => 7,

      ]);
    }
}
