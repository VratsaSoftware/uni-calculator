<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('password'),
            'first_name' => 'admin',
            'last_name' => 'adminski',
            'role_id' => '1',
        ]);
    }
}