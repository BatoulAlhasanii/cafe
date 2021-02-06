<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Country::create(
            [
                'is_active' => true,
            ]
        )->countryTranslations()->createMany([
            [
                'name' => 'Turkey',
                'lang' => 'en',
            ],
            [
                'name' => 'Türkiye',
                'lang' => 'tr',
            ]
        ]);
    }
}
