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
                'slug' => 'extraforte',
                'image' => 'images/intensity/Extraforte.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Extraforte',
                'lang' => 'en',
            ],
            [
                'name' => 'Extraforte',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'classico',
                'image' => 'images/intensity/Classico.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Classico',
                'lang' => 'en',
            ],
            [
                'name' => 'Classico',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'suave',
                'image' => 'images/intensity/Suave.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Suave',
                'lang' => 'en',
            ],
            [
                'name' => 'Suave',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'descafeinado',
                'image' => 'images/intensity/Descafeinado.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Descafeinado',
                'lang' => 'en',
            ],
            [
                'name' => 'Descafeinado',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Category::create(
            [
                'slug' => 'intenso',
                'image' => 'images/intensity/Intenso.png',
                'sequence' => 2,
                'parent_id' => 1,
                'is_active' => true,
            ]
        )->categoryTranslations()->createMany([
            [
                'name' => 'Intenso',
                'lang' => 'en',
            ],
            [
                'name' => 'Intenso',
                'lang' => 'tr',
            ]
        ]);

    }
}
