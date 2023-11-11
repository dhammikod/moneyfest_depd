<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis_Kategori;

class JenisKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis_Kategori::create(
            [
                'jenis_kategori' => "pengeluaran",
            ]
        );
        Jenis_Kategori::create(
            [
                'jenis_kategori' => "pendapatan",
            ]
        );
    }
}
