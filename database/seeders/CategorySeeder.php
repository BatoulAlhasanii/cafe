<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(
            [
                'image' => '',
                'sequence' => 1,
                'parent_id' => 0,
                'is_active' => true,
            ]
        )->categoriesTranslations()->createMany([
            [
                'name' => 'Coffee',
                'lang' => 'en',
            ],
            [
                'name' => 'Kahve',
                'lang' => 'tr',
            ]
        ]);
    }
}
