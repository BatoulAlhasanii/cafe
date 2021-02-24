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
                'slug' => 'coffee',
                'sequence' => 1,
                'parent_id' => 0,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Coffee',
                'lang' => 'en',
            ],
            [
                'name' => 'Kahve',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'filter',
                'image' => 'images/intensity/Extraforte.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Filter',
                'lang' => 'en',
            ],
            [
                'name' => 'Filter',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'expresso',
                'image' => 'images/intensity/Classico.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Expresso',
                'lang' => 'en',
            ],
            [
                'name' => 'Expresso',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'turkish-coffee',
                'image' => 'images/intensity/Suave.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Turkish Coffee',
                'lang' => 'en',
            ],
            [
                'name' => 'Turkish Coffee',
                'lang' => 'tr',
            ]
        ]);

    }
}
