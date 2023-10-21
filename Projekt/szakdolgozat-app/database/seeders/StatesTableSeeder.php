<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = 
        [
            ['name' => 'Bács-Kiskun vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Baranya vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Békés vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Borsod-Abaúj-Zemplén vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Csongrád vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fejér vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Győr-Moson-Sopron vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hajdú-Bihar vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Heves vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jász-Nagykun-Szolnok vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Komárom-Esztergom vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nógrád vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pest vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Somogy vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Szabolcs-Szatmár-Bereg vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tolna vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vas vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Veszprém vármegye', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Zala vármegye', 'created_at' => now(), 'updated_at' => now()],
        ];
        
        DB::table('states')->insert($states);
    }
}
    