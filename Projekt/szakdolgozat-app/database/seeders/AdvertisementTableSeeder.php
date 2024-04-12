<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertisements = [
            [
                'user_id' => 2,
                'city_id' => 1,
                'category_id' => 1,
                'title' => 'Audi A4',
                'price' => 3000000,
                'description' => 'Audi A4 2010.',
                'mobile_number' => '0630232123',
            ],
            [
                'user_id' => 2,
                'city_id' => 1,
                'category_id' => 2,
                'title' => 'Suzuki motor',
                'price' => 500000,
                'description' => 'Eladó suzuki motor.',
                'mobile_number' => '0630232123',
            ],
            [
                'user_id' => 3,
                'city_id' => 100,
                'category_id' => 3,
                'title' => 'Pelenka',
                'price' => 3000,
                'description' => 'Eladó 30 darabos pelenka.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 3,
                'city_id' => 100,
                'category_id' => 4,
                'title' => 'Asztal',
                'price' => 30000,
                'description' => '4 személyes asztal eladó.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 4,
                'city_id' => 612,
                'category_id' => 5,
                'title' => 'Téli kabát',
                'price' => 5000,
                'description' => 'Téle kabát eladó.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 4,
                'city_id' => 612,
                'category_id' => 5,
                'title' => 'Téli sapka',
                'price' => 2000,
                'description' => 'Téle sapka eladó.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 4,
                'city_id' => 612,
                'category_id' => 6,
                'title' => 'Fogkrém',
                'price' => 1000,
                'description' => 'Fogkrém eladó.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 5,
                'city_id' => 980,
                'category_id' => 7,
                'title' => 'Lámpa izzó',
                'price' => 500,
                'description' => 'Lámpa izzó eladó.',
            ],
            [
                'user_id' => 5,
                'city_id' => 980,
                'category_id' => 8,
                'title' => 'Cement',
                'price' => 5000,
                'description' => 'Cement eladó.',
            ],
            [
                'user_id' => 6,
                'city_id' => 1200,
                'category_id' => 9,
                'title' => 'Bor',
                'price' => 1500,
                'description' => '500 ml bor eladó.',
            ],
            [
                'user_id' => 6,
                'city_id' => 1200,
                'category_id' => 10,
                'title' => 'Mamma Mia',
                'price' => 3500,
                'description' => 'Eladó 2008 Mamma Mia mozifilm.',
            ],
            [
                'user_id' => 6,
                'city_id' => 1200,
                'category_id' => 11,
                'title' => 'Gitár',
                'price' => 35000,
                'description' => 'Eladó gitár.',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 17,
                'title' => 'PS5',
                'price' => 150000,
                'description' => 'Eladó digital PS5.',
                'mobile_number' => '06309924351',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 17,
                'title' => 'PS5',
                'price' => 180000,
                'description' => 'Eladó lemezes PS5.',
                'mobile_number' => '06309924351',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 20,
                'title' => 'Spiderman 2',
                'price' => 180000,
                'description' => 'Eladó spiderman 2 játék. PS5 változat.',
                'mobile_number' => '06309924351',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 20,
                'title' => 'Spiderman',
                'price' => 10000,
                'description' => 'Eladó spiderman játék. PS4 változat.',
                'mobile_number' => '06309924351',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 17,
                'title' => 'XBOX Series X',
                'price' => 160000,
                'description' => 'Eladó XBOX Series X.',
                'mobile_number' => '06309924351',
            ],
            [
                'user_id' => 4,
                'city_id' => 612,
                'category_id' => 6,
                'title' => 'Fogkefe',
                'price' => 500,
                'description' => 'Fogkefe eladó.',
                'mobile_number' => '06309923451',
            ],
            [
                'user_id' => 7,
                'city_id' => 3000,
                'category_id' => 7,
                'title' => 'Lámpa izzó',
                'price' => 1000,
                'description' => 'Lámpa izzó eladó.',
            ],
            [
                'user_id' => 6,
                'city_id' => 1200,
                'category_id' => 11,
                'title' => 'Zongora',
                'price' => 1000000,
                'description' => 'Eladó zongora.',
            ],
            [
                'user_id' => 6,
                'city_id' => 1200,
                'category_id' => 11,
                'title' => 'Dob',
                'price' => 100000,
                'description' => 'Eladó dob.',
            ],
        ];

        foreach($advertisements as $advertisement)
        {
            DB::table('advertisements')->insert([
                'user_id' => $advertisement['user_id'],
                'city_id' => $advertisement['city_id'],
                'category_id' => $advertisement['category_id'],
                'title' => $advertisement['title'],
                'price' => $advertisement['price'],
                'description' => $advertisement['description'],
                'mobile_number' => $advertisement['mobile_number'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
