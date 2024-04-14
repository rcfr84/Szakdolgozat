<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $counties = [
            'Bács-Kiskun vármegye',
            'Baranya vármegye',
            'Békés vármegye',
            'Borsod-Abaúj-Zemplén vármegye',
            'Csongrád vármegye',
            'Fejér vármegye',
            'Győr-Moson-Sopron vármegye',
            'Hajdú-Bihar vármegye',
            'Heves vármegye',
            'Jász-Nagykun-Szolnok vármegye',
            'Komárom-Esztergom vármegye',
            'Nógrád vármegye',
            'Pest vármegye',
            'Somogy vármegye',
            'Szabolcs-Szatmár-Bereg vármegye',
            'Tolna vármegye',
            'Vas vármegye',
            'Veszprém vármegye',
            'Zala vármegye',
        ];
        
        foreach ($counties as $county) 
        {
            DB::table('counties')->insert([
                'name' => $county,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
