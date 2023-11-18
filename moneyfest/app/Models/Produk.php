<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'stok',
        'harga_jual',
        'harga_beli',
        'terjual',
        'user_id',
    ];
}
