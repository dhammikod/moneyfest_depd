<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Keuangan;
use Carbon\Carbon;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userDefinedDate = "2023-11-10";
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 40000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
    }
}
