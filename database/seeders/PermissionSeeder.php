<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Permission::createMany([
            [
                'name' => 'Manage Database',
                'slug' => 'manage-database'
            ],
            [
                'name' => 'Manage Orders',
                'slug' => 'manage-orders',
            ],
            [
                'name' => 'Manage Inventory',
                'slug' => 'manage-inventory',
            ]
        ]);
    }
}
