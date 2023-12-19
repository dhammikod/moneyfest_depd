<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class predictions extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'iklan',
        'penjualan_produk',
        'royalti',
        'lisensi',
        'donasi',
        'langganan',
        'afiliasi',
        'layanan_konsultasi',
        'penjualan_aset',
        'lain_lain',
        'prediction',
        'user_id',
    ];
}
