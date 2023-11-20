<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(
            [
                'kategori' => "transportasi",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "asuransi",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "gaji pegawai",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "pembelian produk",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "marketing",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "bahan habis pakai",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "operasional",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "administrasi",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "distribusi",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "pengiriman",
                'id_jenis_kategori' => 1,
            ]
        );
        Kategori::create(
            [
                'kategori' => "lain-lain",
                'id_jenis_kategori' => 1,
            ]
        );



        Kategori::create(
            [
                'kategori' => "penjualan produk",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "iklan",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "royalti",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "lain-lain",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "lisensi",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "donasi",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "langganan",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "afiliasi",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "layanan konsultasi",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "penjualan aset",
                'id_jenis_kategori' => 2,
            ]
        );
        Kategori::create(
            [
                'kategori' => "lain-lain",
                'id_jenis_kategori' => 2,
            ]
        );
    }
}
