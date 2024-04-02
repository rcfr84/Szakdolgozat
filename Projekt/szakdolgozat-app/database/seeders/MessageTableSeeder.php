<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'sender_id' => 2,
                'receiver_id' => 3,
                'message' => 'Hello, megvan még a pelenka?',
                'created_at' => '2021-01-01 12:00:00'
            ],
            [
                'sender_id' => 3,
                'receiver_id' => 2,
                'message' => 'Szia, megvan még. Érdekel?',
                'created_at' => '2021-01-01 14:10:00'
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 4,
                'message' => 'Hello, megvan még a téli kabát?',
                'created_at' => '2021-01-01 12:00:00'
            ],
            [
                'sender_id' => 4,
                'receiver_id' => 2,
                'message' => 'Szia, megvan még. Érdekel?',
                'created_at' => '2021-01-01 17:33:00'
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 7,
                'message' => 'Hello, megvan még a digital PS5?',
                'created_at' => '2021-01-01 12:00:00'
            ],
            [
                'sender_id' => 7,
                'receiver_id' => 2,
                'message' => 'Nincsen.',
                'created_at' => '2021-01-01 18:00:00'
            ],
            [
                'sender_id' => 7,
                'receiver_id' => 4,
                'message' => 'Szia, megvan még. Érdekel?',
                'created_at' => '2021-01-01 18:00:00'
            ],
        ];

        foreach ($messages as $message){
            DB::table('messages')->insert($message);
        }
    }
}
