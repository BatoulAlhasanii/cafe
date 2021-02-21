<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            [
                'name' => 'admin', //1
                'slug' => 'admin'
            ],
            [
                'name' => 'Accountant', //2
                'slug' => 'accountant',
            ],
            [
                'name' => 'Store Keeper', //3
                'slug' => 'store-keeper',
            ],
            [
                'name' => 'Supervisor', //4
                'slug' => 'supervisor',
            ],
            [
                'name' => 'Permission Free', //5
                'slug' => 'permission-free',
            ]
        ]);

    }
}
