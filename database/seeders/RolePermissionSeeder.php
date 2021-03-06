<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles_permissions')->insert([
            [
                'role_id' => 1,
                'permission_id' => 1
            ],
            [
                'role_id' => 2,
                'permission_id' => 6
            ],
            [
                'role_id' => 2,
                'permission_id' => 8
            ],
            [
                'role_id' => 2,
                'permission_id' => 9
            ],
            [
                'role_id' => 2,
                'permission_id' => 14
            ],
            [
                'role_id' => 2,
                'permission_id' => 15
            ],

            [
                'role_id' => 3,
                'permission_id' => 6
            ],
            [
                'role_id' => 3,
                'permission_id' => 8
            ],
            [
                'role_id' => 3,
                'permission_id' => 9
            ],
            [
                'role_id' => 3,
                'permission_id' => 10
            ],
            [
                'role_id' => 3,
                'permission_id' => 19
            ],

            [
                'role_id' => 4,
                'permission_id' => 2
            ],
            [
                'role_id' => 4,
                'permission_id' => 3
            ],
            [
                'role_id' => 4,
                'permission_id' => 6
            ],
            [
                'role_id' => 4,
                'permission_id' => 9
            ],
            [
                'role_id' => 4,
                'permission_id' => 11
            ],
            [
                'role_id' => 4,
                'permission_id' => 14
            ],
            [
                'role_id' => 4,
                'permission_id' => 16
            ]
        ]);
    }
}
