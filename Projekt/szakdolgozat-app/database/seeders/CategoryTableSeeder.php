<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Autó',
            'Motor',
            'Baba, mama',
            'Bútor, lakberendezés',
            'Divat és ruházat',
            'Egyéb',
            'Elektronika',
            'Építkezés, felújítás',
            'Étel, ital',
            'Film és zene',
            'Hangszer',
            'Háziállat',
            'Háztartási gép',
            'Ingatlan',
            'Irodatechnika',
            'Játék',
            'Műszaki cikk',
            'Otthon és kert',
            'Sport és szabadidő',
            'Számítógép',
            'Szépségáplás és egészség',
        ];

        foreach ($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
