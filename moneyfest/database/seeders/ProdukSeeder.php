<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create(
            [
                'nama' => 'bakso',
                'jenis' => 'makanan',
                'deskripsi' => 'bakso cak san',
                'stok' => 5,
                'harga_jual' => 30000,
                'harga_beli' => 10000,
                'terjual' => 3,
                'user_id' => 1,
            ]
        );

        Produk::create(
            [
                'nama' => 'es teh',
                'jenis' => 'minuman',
                'deskripsi' => 'es nutrisari',
                'stok' => 10,
                'harga_jual' => 10000,
                'harga_beli' => 3000,
                'terjual' => 20,
                'user_id' => 1,
            ]
        );
        Produk::create(
            [
                'nama' => 'kopi',
                'jenis' => 'minuman',
                'deskripsi' => 'kopi kapal api',
                'stok' => 10,
                'harga_jual' => 10000,
                'harga_beli' => 3000,
                'terjual' => 10,
                'user_id' => 1,
            ]
        );
    }
}
