<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role_id' => 1,
            ],
            [
                'role_id' => 2,
                'name' => 'Tóth József',
                'email' => 'toth.jozsef@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'Kis Tamás',
                'email' => 'kis.tamas@freemail.com',
                'password' => bcrypt('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'Nagy Judit',
                'email' => 'nagy.judit@freemail.com',
                'password' => bcrypt('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'Szabó Tímea',
                'email' => 'szabo.timea@freemail.com',
                'password' => bcrypt('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'Kovács Péter',
                'email' => 'kovacs.peter@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'role_id' => 2,
                'name' => 'Nagy Júlia',
                'email' => 'nagy.julia@gmail.com',
                'password' => bcrypt('password'),
            ],

        ];

        foreach ($users as $user)
        {
            DB::table('users')->insert([
                'role_id' => $user['role_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
