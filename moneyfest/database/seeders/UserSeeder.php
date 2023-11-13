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
    }
}
