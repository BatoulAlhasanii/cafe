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
        \App\Role::createMany([
            [
                'name' => 'admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Inventory Clerk',
                'slug' => 'inventory-clerk',
            ]
        ]);

    }
}
