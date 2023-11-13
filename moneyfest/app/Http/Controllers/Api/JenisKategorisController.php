<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis_Kategori;

class JenisKategorisController extends Controller
{
    public function index()
    {
        $jenisKategoris = Jenis_Kategori::all();
        return response()->json($jenisKategoris);
    }

    public function pengeluaran()
    {
        $jenisKategoris = Jenis_Kategori::find(2);
        $tes = [];
        array_push($tes, $jenisKategoris);
        return response()->json($tes);
    }
}
