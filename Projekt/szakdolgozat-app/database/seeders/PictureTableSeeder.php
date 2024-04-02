<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pictures = [
            [
                'advertisement_id' => 1,
                'src' => "advertisement_images/advertisement_image_audi.jpg",
            ],
            [
                'advertisement_id' => 2,
                'src' => 'advertisement_images/suzuki.jpg',
            ],
            [
                'advertisement_id' => 3,
                'src' => 'advertisement_images/pelenka.png',
            ],
            [
                'advertisement_id' => 4,
                'src' => 'advertisement_images/asztal.jpg',
            ],
            [
                'advertisement_id' => 7,
                'src' => 'advertisement_images/fogkrem.jpg',
            ],
            [
                'advertisement_id' => 9,
                'src' => 'advertisement_images/cement.png',
            ],
            [
                'advertisement_id' => 9,
                'src' => 'advertisement_images/cement2.jpeg',
            ],
            [
                'advertisement_id' => 10,
                'src' => 'advertisement_images/bor.jpg',
            ],
            [
                'advertisement_id' => 11,
                'src' => 'advertisement_images/mammamia.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'advertisement_images/gitar.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'advertisement_images/gitar2.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'advertisement_images/suzuki.jpg',
            ],
            [
                'advertisement_id' => 13,
                'src' => 'advertisement_images/ps5d.jpg',
            ],
            [
                'advertisement_id' => 14,
                'src' => 'advertisement_images/ps5.jpg',
            ],
            [
                'advertisement_id' => 15,
                'src' => 'advertisement_images/spiderman.jpg',
            ],
            [
                'advertisement_id' => 15,
                'src' => 'advertisement_images/spiderman2.jpg',
            ],
        ];

        foreach ($pictures as $picture) {
            DB::table('pictures')->insert([
                'advertisement_id' => $picture['advertisement_id'],
                'src' => $picture['src'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
