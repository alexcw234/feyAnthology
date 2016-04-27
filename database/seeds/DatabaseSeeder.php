<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Model::unguard();

        $this->call(GroupsSeeder::class);
        $this->call(CatsSeeder::class);

                $this->call(TestCatsSeeder::class);

        $this->call(UsersSeeder::class);

                $this->call(TestUsersSeeder::class);

        $this->call(UGCSeeder::class);

                $this->call(TestUGCSeeder::class);
                
        $this->call(TypeSeeder::class);
        $this->call(WorksSeeder::class);









      Model::reguard();
    }
}
