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
            'email' => 'admin@admin.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'administrator',
            'email' => 'catadmin@catadmin.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'globalarchivist',
            'email' => 'globalarchivist@globalarchivist.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'archivist',
            'email' => 'archivist@archivist.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'supermoderator',
            'email' => 'supermod@supermod.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'moderator',
            'email' => 'mod@mod.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'contributorplus',
            'email' => 'plus@plus.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'contributor',
            'email' => 'contributor@contributor.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'globallimit',
            'email' => 'globallimit@catlimit.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'catlimit',
            'email' => 'catlimit@catlimit.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'globalban',
            'email' => 'globalban@globalban.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'catban',
            'email' => 'catban@catban.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'test1',
            'email' => 'test1@test.com',
            'password' => bcrypt('test'),
        ]);

        User::create([
            'username' => 'test2',
            'email' => 'test2@test.com',
            'password' => bcrypt('test'),
        ]);


    }
}

 ?>
