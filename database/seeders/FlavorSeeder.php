<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FlavorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Flavor::create(
            [
                'slug' => 'strong',
                'image' => 'images/intensity/Extraforte.png',
                'sequence' => 1,
                'is_active' => true,
            ]
        )->flavorTranslations()->createMany([
            [
                'name' => 'Strong',
                'lang' => 'en',
            ],
            [
                'name' => 'Strong',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Flavor::create(
            [
                'slug' => 'classic',
                'image' => 'images/intensity/Classico.png',
                'sequence' => 1,
                'is_active' => true,
            ]
        )->flavorTranslations()->createMany([
            [
                'name' => 'Classic',
                'lang' => 'en',
            ],
            [
                'name' => 'Classic',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Flavor::create(
            [
                'slug' => 'soft',
                'image' => 'images/intensity/Suave.png',
                'sequence' => 1,
                'is_active' => true,
            ]
        )->flavorTranslations()->createMany([
            [
                'name' => 'Soft',
                'lang' => 'en',
            ],
            [
                'name' => 'Soft',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Flavor::create(
            [
                'slug' => 'intense',
                'image' => 'images/intensity/Intenso.png',
                'sequence' => 1,
                'is_active' => true,
            ]
        )->flavorTranslations()->createMany([
            [
                'name' => 'Intense',
                'lang' => 'en',
            ],
            [
                'name' => 'Intense',
                'lang' => 'tr',
            ]
        ]);
    }
}
