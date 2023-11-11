<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nominal',
        'kategori',
        'jumlah',
        'satuan',
        'tanggal',
        'catatan',
        'user_id',
    ];
}
