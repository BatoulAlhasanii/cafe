<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\City::create(
            [
                'country_id' => 1,
                'shipping_fees' => 5,
                'is_active' => true,
            ]
        )->cityTranslations()->createMany([
            [
                'name' => 'Istanbul',
                'lang' => 'en',
            ],
            [
                'name' => 'İstanbul',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\City::create(
            [
                'country_id' => 1,
                'shipping_fees' => 2,
                'is_active' => true,
            ]
        )->cityTranslations()->createMany([
            [
                'name' => 'Ankara',
                'lang' => 'en',
            ],
            [
                'name' => 'Ankara',
                'lang' => 'tr',
            ]
        ]);
    }
}
