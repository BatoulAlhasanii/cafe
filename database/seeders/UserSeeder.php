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
                'password' => Hash::make('admin@test.com'),
                'role_id' =>  1
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@test.com',
                'password' => Hash::make('admin2@test.com'),
                'role_id' =>  2
            ]
        ]);
    }
}
