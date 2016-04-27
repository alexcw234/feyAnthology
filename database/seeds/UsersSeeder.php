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
            'username' => 'superadmin',
            'email' => 'feyanthology@gmail.com',
            'password' => bcrypt('test'),
            'globalID' => 1,
        ]);



    }
}

 ?>
