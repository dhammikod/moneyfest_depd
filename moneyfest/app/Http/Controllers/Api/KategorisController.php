<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategorisController extends Controller
{
    public function index($jenis)
    {
        $kategoris = Kategori::where('id_jenis_kategori', $jenis)->get();
        return response()->json($kategoris);
    }
}
