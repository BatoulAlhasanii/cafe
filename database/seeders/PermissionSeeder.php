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
        \App\Models\Permission::insert([
            [
                'name' => 'Manage Database', //1
                'slug' => 'manage-database'
            ],

            [
                'name' => 'View Dashboard', //2
                'slug' => 'view-dashboard'
            ],
            [
                'name' => 'View Categories', //3
                'slug' => 'view-categories'
            ],
            [
                'name' => 'Create Categories', //4
                'slug' => 'create-categories'
            ],
            [
                'name' => 'Edit Categories', //5
                'slug' => 'edit-categories'
            ],
            [
                'name' => 'View Products', //6
                'slug' => 'view-products',
            ],
            [
                'name' => 'Create Products', //7
                'slug' => 'create-products',
            ],
            [
                'name' => 'Edit Products', //8
                'slug' => 'edit-products',
            ],
            [
                'name' => 'View Orders', //9
                'slug' => 'view-orders',
            ],
            [
                'name' => 'Update Orders', //10
                'slug' => 'update-orders',
            ],
            [
                'name' => 'View Users', //11
                'slug' => 'view-users',
            ],
            [
                'name' => 'Create Users', //12
                'slug' => 'create-users',
            ],
            [
                'name' => 'Edit Users', //13
                'slug' => 'edit-users',
            ],
            [
                'name' => 'View Settings', //14
                'slug' => 'view-settings',
            ],
            [
                'name' => 'Update Settings', //15
                'slug' => 'update-settings',
            ]
        ]);
    }
}
