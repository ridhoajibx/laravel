<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Jumakri Ridho Fauzi',
            'username' => 'ridhoajibx',
            'email' => 'ridhoajibx@gmail.com',
            'password' => bcrypt('kodok000'),
        ]);
    }
}
