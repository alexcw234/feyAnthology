<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'username' => 'Admin',
            'email' => 'feyanthology@gmail.com',
            'password' => bcrypt('test'),
            'globalID' => 1,
        ]);

        User::create([
            'username' => 'Moderator',
            'email' => 'mod@mod.com',
            'password' => bcrypt('Moderator'),
            'globalID' => 7,
        ]);

        User::create([
            'username' => 'Contributor',
            'email' => 'contributor@contributor.com',
            'password' => bcrypt('Contributor'),
            'globalID' => 7,
        ]);


    }
}

 ?>
