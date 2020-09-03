<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Martin',
            'username' => 'Martin Muraya',
            'image' => 'default.png',
            'email' => 'martin@identigate.co.ke',
            'password' => bcrypt('Soja@2016'),
            'about' => 'Yes we can',
        ]);
    }
}
