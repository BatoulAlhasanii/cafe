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
        //'attribute_value' => '{"Filling Type": "High Vacuum", "Shelf life": "540 days after date of manufacture", "Type of inner packaging": "Aluminized", "External packaging type": "Cardboard box", "Package weight": "9 grams (inner package) + 26 grams (box)", "Repacking weight": "360g", "Composition": "100% Arabica Coffee", "Storage conditions": "Dry and arid place away from the presence of sun and chemicals.", "Maximum stacking": "8 boxes", "Product bar code": "7896295001012", "Brand": "Café Odebrecht"}',

        \App\Models\Product::create(
            [
                'category_id' => 2,
                'brand_id' => 1,
                'slug' => 'café-odebrecht-superior',
                'price' => 10.00,
                'discount_price' => 9.00,
                'images' => 'images/products/7896295001012_11_1_1200_72_rgb.png,images/products/7896295001012_12_1_1200_72_rgb.png,images/products/7896295001012_1_1_1200_72_rgb.png,images/products/7896295001012_8_1_1200_72_rgb.png',
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
                'attribute_value' => 'Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner:packaging	Aluminized,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:360g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:7896295001012,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Café Odebrecht Superior',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => 'Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner:packaging	Aluminized,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:360g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:7896295001012,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 2,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'odebrecht-superior-coffee-250g',
                'images' => 'images/products/site_superior_250.jpg',
                'unit_amount' => 250,
                'sku' => '000251P',
                'stock' => 5,
                'is_featured' => false,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Odebrecht Superior Coffee 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => 'Size:250g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:7896295001029,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht Superior Coffee 250g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma.',
                'attribute_value' => 'Size:250g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:7896295001029,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 2,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'odebrecht-premium-coffee-500g',
                'images' => 'images/products/7896295000091_11_1_1200_72_rgb.png,images/products/7896295000091_12_1_1200_72_rgb.png,images/products/7896295000091_1_1_1200_72_rgb.png,images/products/7896295000091_8_1_1200_72_rgb.png',
                'unit_amount' => 500,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Odebrecht Premium Coffee 500g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Premium is a Traditional coffee that has a strong and full-bodied flavor, in addition to being produced from the selection of the best beans from the largest coffee producing regions, combined with technology and strict quality control. It is a strong, aromatic coffee made especially for people with good taste and taste.',
                'attribute_value' => 'Size:500g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Polyester + Metallization and Polyethylene,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:7 boxes,Product bar code:7896295000091,Extra strong:Yea,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht Premium Coffee 500g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Premium is a Traditional coffee that has a strong and full-bodied flavor, in addition to being produced from the selection of the best beans from the largest coffee producing regions, combined with technology and strict quality control. It is a strong, aromatic coffee made especially for people with good taste and taste.',
                'attribute_value' => 'Size:500g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Polyester + Metallization and Polyethylene,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:7 boxes,Product bar code:7896295000091,Extra strong:Yea,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 2,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'odebrecht-gourmet-coffee-500g',
                'images' => 'images/products/7896295000305_11_1_1200_72_rgb.png,images/products/7896295000305_12_1_1200_72_rgb.png,images/products/7896295000305_1_1_1200_72_rgb.png,images/products/7896295000305_8_1_1200_72_rgb.png',
                'unit_amount' => 500,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Odebrecht Gourmet Coffee 500g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet is a coffee for consumers who demand a more refined, tasty and charming product. With grains from the Cerrado Mineiro, it has a softer and sweeter palate, which eliminates the use of sugar for most of its consumers. Its aromas and flavors have notes that resemble chocolate, caramel, flowers, fruits and nuts.',
                'attribute_value' => 'Size:500g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Polyester + Metallization and Polyethylene,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:7 boxes,Product bar code:7896295000305,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht Gourmet Coffee 500g',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet is a coffee for consumers who demand a more refined, tasty and charming product. With grains from the Cerrado Mineiro, it has a softer and sweeter palate, which eliminates the use of sugar for most of its consumers. Its aromas and flavors have notes that resemble chocolate, caramel, flowers, fruits and nuts.',
                'attribute_value' => 'Size:500g,Filling Type:High Vacuum,Shelf life:540 days after date of manufacture,Type of inner packaging:Polyester + Metallization and Polyethylene,External packaging type:Cardboard box,Package weight:9 grams (inner package) + 26 grams (box),Repacking weight:260g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:7 boxes,Product bar code:7896295000305,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 3,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'odebrecht-espresso-coffee-in-capsule-compatible-with-nespresso',
                'images' => 'images/products/capsula-gourmet.jpeg',
                'unit_amount' => 52,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Odebrecht Espresso Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Odebrecht Espresso in capsules is a coffee for consumers who demand a more refined product, roasted beans in small quantities to guarantee incomparable aroma, flavor, creaminess and body. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500235,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht Espresso Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Odebrecht Espresso in capsules is a coffee for consumers who demand a more refined product, roasted beans in small quantities to guarantee incomparable aroma, flavor, creaminess and body. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500235,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 3,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'odebrecht-lungo-coffee-in-capsule-compatible-with-nespresso',
                'images' => 'images/products/capsula-lungo.jpeg',
                'unit_amount' => 52,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Odebrecht Lungo Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet Lungo is a coffee with a legitimate short Italian flavor. Its aromas and flavors have notes that resemble dark chocolate with a slight fruity flavor. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500237,Brand:Café Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Odebrecht Lungo Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet Lungo is a coffee with a legitimate short Italian flavor. Its aromas and flavors have notes that resemble dark chocolate with a slight fruity flavor. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500237,Brand:Café Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 3,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'superior-odebrecht-coffee-in-capsule-compatible-with-nespresso',
                'images' => 'images/products/capsula-superior.jpeg',
                'unit_amount' => 52,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Superior Odebrecht Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500238,Brand Café:Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Superior Odebrecht Coffee in Capsule Compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Superior is a selection of the best coffee from Paraná blended with the best beans from the south of Minas Gerais, which determines a strong and full-bodied flavor of superior quality, medium dark roasting, medium fine grinding. The result is a product that meets the demands of consumers who demand a full-bodied flavor and a strong aroma. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500238,Brand Café:Odebrecht',
                'lang' => 'tr',
            ]
        ]);

        \App\Models\Product::create(
            [
                'category_id' => 3,
                'brand_id' => 1,
                'price' => 10.00,
                'discount_price' => 9.00,
                'slug' => 'coffee-odebrecht-ristretto-in-capsule-compatible-with-nespresso',
                'images' => 'images/products/capsula-ristretto.jpeg',
                'unit_amount' => 52,
                'sku' => '000204P',
                'stock' => 5,
                'is_featured' => true,
                'is_active' => true,
            ]
        )->productTranslations()->createMany([
            [
                'name' => 'Coffee Odebrecht Ristretto in Capsule compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet Ristretto is a coffee with a legitimate Italian short flavor, its aromas and flavors have notes that resemble dark chocolate with a light fruity flavor. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500236,Brand Café:Odebrecht',
                'lang' => 'en',
            ],
            [
                'name' => 'Coffee Odebrecht Ristretto in Capsule compatible with Nespresso',
                'unit' => 'g',
                'description' => 'Café Odebrecht Gourmet Ristretto is a coffee with a legitimate Italian short flavor, its aromas and flavors have notes that resemble dark chocolate with a light fruity flavor. Capsules compatible with Nespresso® machines',
                'attribute_value' => 'Size:52g,Shelf life:1 year after manufacture date,Type of inner packaging:Aluminized,External packaging type:Cardboard box,Package weight:8g,Presentation: Roasted and ground coffee in capsules,Box packaging: Contains 10 capsules,Net weight per capsule: 5.2 g,Net weight per box: 52 g,Composition:100% Arabica Coffee,Storage conditions:Dry and arid place away from the presence of sun and chemicals.,Maximum stacking:8 boxes,Product bar code:789629500236,Brand Café:Odebrecht',
                'lang' => 'tr',
            ]
        ]);
    }
}
