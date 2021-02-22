<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::insert([
            [
                'setting_name' => 'activate_discount',
                'setting_label' => 'Activate Discount',
                'setting_value' => false,
                'setting_type' => 'select'
            ],
            [
                'setting_name' => 'tax',
                'setting_label' => 'Tax',
                'setting_value' => 8,
                'setting_type' => 'number'
            ]
        ]);
    }
}
