<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Advertisement;
use Illuminate\Database\Seeder;
use Database\Seeders\CountyTableSeeder;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\CategoryTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [CountyTableSeeder::class],
            [CityTableSeeder::class],
            [CategoryTableSeeder::class],
            [RoleTableSeeder::class],
            [UserTableSeeder::class],
            [AdvertisementTableSeeder::class],
            [PictureTableSeeder::class],
            [MessageTableSeeder::class],
        );

    }
}
