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
                'src' => "storage/advertisement_images/advertisement_image_audi.jpg",
            ],
            [
                'advertisement_id' => 2,
                'src' => 'images/suzuki.jpg',
            ],
            [
                'advertisement_id' => 3,
                'src' => 'images/pelenka.png',
            ],
            [
                'advertisement_id' => 4,
                'src' => 'images/asztal.jpg',
            ],
            [
                'advertisement_id' => 7,
                'src' => 'images/fogkrem.jpg',
            ],
            [
                'advertisement_id' => 9,
                'src' => 'images/cement.png',
            ],
            [
                'advertisement_id' => 9,
                'src' => 'images/cement2.jpeg',
            ],
            [
                'advertisement_id' => 10,
                'src' => 'images/bor.jpg',
            ],
            [
                'advertisement_id' => 11,
                'src' => 'images/mammamia.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'images/gitar.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'images/gitar2.jpg',
            ],
            [
                'advertisement_id' => 12,
                'src' => 'images/suzuki.jpg',
            ],
            [
                'advertisement_id' => 13,
                'src' => 'images/ps5d.jpg',
            ],
            [
                'advertisement_id' => 14,
                'src' => 'images/ps5.jpg',
            ],
            [
                'advertisement_id' => 15,
                'src' => 'images/spiderman.jpg',
            ],
            [
                'advertisement_id' => 15,
                'src' => 'images/spiderman2.jpg',
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
