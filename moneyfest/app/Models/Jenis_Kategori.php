<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'jenis_kategori',
    ];
}
