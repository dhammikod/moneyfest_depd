<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create(
            [
                'nama' => "dhammiko",
                'job_desc' => 'mengelap meja',
                'gaji' => 2000000,
                'user_id' => 1,
            ],
        );
    }
}
