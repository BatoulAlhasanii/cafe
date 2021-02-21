<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'name' => 'admin1',
                'email' => 'admin1@test.com',
                'password' => Hash::make('admin1@test.com'),
                'role_id' =>  1
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@test.com',
                'password' => Hash::make('admin2@test.com'),
                'role_id' =>  2
            ],
            [
                'name' => 'admin3',
                'email' => 'admin3@test.com',
                'password' => Hash::make('admin3@test.com'),
                'role_id' =>  3
            ],
            [
                'name' => 'admin4',
                'email' => 'admin4@test.com',
                'password' => Hash::make('admin4@test.com'),
                'role_id' =>  4
            ],
            [
                'name' => 'admin5',
                'email' => 'admin5@test.com',
                'password' => Hash::make('admin5@test.com'),
                'role_id' =>  5
            ]
        ]);
    }
}
