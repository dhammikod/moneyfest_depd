<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => "dhammiko",
                'email' => 'd@gmail.com',
                'password' => Hash::make("password123"),
            ],
        );
        User::create(
            [
                'name' => "gebi",
                'email' => 'gebi@gmail.com',
                'password' => Hash::make("ochi"),
            ],
        );
        User::create(
            [
                'name' => "demo",
                'email' => 'demo@gmail.com',
                'password' => Hash::make("demo1"),
            ],
        );
        User::create(
            [
                'name' => "vebby",
                'email' => 'v@gmail.com',
                'password' => Hash::make("123masuk"),
                'role' => 'admin',
            ],
        );
    }
}
