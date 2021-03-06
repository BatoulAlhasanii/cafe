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
        $cities =
            [
                ['country_id' => 1, 'shipping_fees' => 7, 'is_active' => true, 'name' => 'İstanbul'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Ankara'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'İzmir'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Adana'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Adıyaman'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Afyon'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Ağrı'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Aksaray'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Amasya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Antalya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Ardahan'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Artvin'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Aydın'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Balıkesir'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bartın'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Batman'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bayburt'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bilecik'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bingöl'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bitlis'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bolu'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Burdur'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Bursa'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Çanakkale'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Çankırı'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Çorum'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Denizli'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Diyarbakır'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Düzce'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Edirne'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Elazığ'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Erzincan'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Erzurum'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Eskişehir'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Gaziantep'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Giresun'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Gümüşhane'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Hakkari'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Hatay'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Iğdır'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Isparta'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kahramanmaraş'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Karabük'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Karaman'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kars'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kastamonu'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kayseri'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kırıkkale'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kırklareli'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kırşehir'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kilis'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kocaeli'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Konya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Kütahya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Malatya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Manisa'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Mardin'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Mersin'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Muğla'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Muş'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Nevşehir'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Niğde'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Ordu'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Osmaniye'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Rize'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Sakarya'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Samsun'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Siirt'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Sinop'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Sivas'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Şanlıurfa'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Şırnak'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Tekirdağ'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Tokat'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Trabzon'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Tunceli'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Uşak'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Van'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Yalova'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Yozgat'],
                ['country_id' => 1, 'shipping_fees' => 11, 'is_active' => true, 'name' => 'Zonguldak']
            ];

            foreach ($cities as $city) {
                \App\Models\City::create(
                    [
                        'country_id' => $city['country_id'],
                        'shipping_fees' => $city['shipping_fees'],
                        'is_active' => $city['is_active'],
                    ]
                )->cityTranslations()->createMany([
                    [
                        'name' => $city['name'],
                        'lang' => 'en',
                    ],
                    [
                        'name' => $city['name'],
                        'lang' => 'tr',
                    ]
                ]);
            }
    }
}
