<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Brand::create(
            [
                'is_active' => true,
            ]
        )->brandTranslations()->createMany([
            [
                'name' => 'Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht',
                'lang' => 'tr',
            ]
        ]);
    }
}
