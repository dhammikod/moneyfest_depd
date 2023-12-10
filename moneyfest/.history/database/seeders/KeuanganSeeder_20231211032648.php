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
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 30000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-11-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
        Keuangan::create(
            [
                'nama' => "pembelian poster",
                'nominal' => 1000000,
                'kategori' => 6,
                'jumlah' => 1,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-11-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 30000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-11-7"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 30000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-11-8"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 30000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-11-9"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
        Keuangan::create(
            [
                'nama' => "pembelian bahan baku",
                'nominal' => 40000,
                'kategori' => 6,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2023-11-10"),
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
                'tanggal' => Carbon::parse("2023-10-10"),
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
                'tanggal' => Carbon::parse("2023-9-10"),
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
                'tanggal' => Carbon::parse("2023-8-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "lisensi baliho",
                'nominal' => 500000,
                'kategori' => 16,
                'jumlah' => 1,
                'satuan' => "paket",
                'tanggal' => Carbon::parse("2023-8-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "penjualan baliho",
                'nominal' => 20000000,
                'kategori' => 21,
                'jumlah' => 1,
                'satuan' => "paket",
                'tanggal' => Carbon::parse("2023-8-11"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "iklan baliho",
                'nominal' => 3000000,
                'kategori' => 12,
                'jumlah' => 1,
                'satuan' => "paket",
                'tanggal' => Carbon::parse("2023-8-12"),
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
                'tanggal' => Carbon::parse("2022-11-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );

        Keuangan::create(
            [
                'nama' => "hasil santet",
                'nominal' => 50000,
                'kategori' => 13,
                'jumlah' => 5,
                'satuan' => "buah",
                'tanggal' => Carbon::parse("2022-10-10"),
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
                'tanggal' => Carbon::parse("2021-1-10"),
                'catatan' => "-",
                'user_id' => 1,
            ]
        );
    }
}
