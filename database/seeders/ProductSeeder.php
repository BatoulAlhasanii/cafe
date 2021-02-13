<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Product::create(
            [
                'category_id' => 6,
                'brand_id' => 1,
                'slug' => 'café-odebrecht-superior',
                'price' => 10.00,
                'discount_price' => 9.00,
                'images' => 'images/products/7896295001012_1_1_1200_72_rgb.png,images/products/7896295001012_11_1_1200_72_rgb.png,images/products/7896295001012_12_1_1200_72_rgb.png',
                'unit_amount' => 500,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Café Odebrecht Superior',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'en',
            ],
            [
                'name' => 'Tr Café Odebrecht Superior',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 6,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'café-odebrecht-superior-250g',
                'images' => 'images/products/7896295001012_1_1_1200_72_rgb.png,images/products/7896295001012_11_1_1200_72_rgb.png,images/products/7896295001012_12_1_1200_72_rgb.png',
                'unit_amount' => 500,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => false,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Café Odebrecht Superior 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'en',
            ],
            [
                'name' => 'Tr Café Odebrecht Superior 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 5,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'café-odebrecht-superior-250g',
                'images' => 'images/products/7896295001012_1_1_1200_72_rgb.png,images/products/7896295001012_11_1_1200_72_rgb.png,images/products/7896295001012_12_1_1200_72_rgb.png',
                'unit_amount' => 500,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Café Odebrecht Superior 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'en',
            ],
            [
                'name' => 'Tr Café Odebrecht Superior 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',
                'lang' => 'tr',
            ]
        ]);
    }
}
