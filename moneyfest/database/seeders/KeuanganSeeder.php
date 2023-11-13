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
        Keuangan::create(
            [
                'nama' => "gaji pegawai",
                'nominal' => 40000,
                'kategori' => 5,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "pembelian kue",
                'nominal' => 40000,
                'kategori' => 4,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "pembelian nastar",
                'nominal' => 40000,
                'kategori' => 4,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "pendapatan ga tau",
                'nominal' => 40000,
                'kategori' => 12,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "royalti",
                'nominal' => 40000,
                'kategori' => 12,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "hasil santet",
                'nominal' => 40000,
                'kategori' => 13,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "hasil pesugihan",
                'nominal' => 40000,
                'kategori' => 13,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse($userDefinedDate),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
    }
}
