<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = DB::table('keuangans as k')
            ->join('kategoris as kat', 'k.kategori', '=', 'kat.id')
            ->join('jenis_kategoris as jen', 'kat.id_jenis_kategori', '=', 'jen.id')
            ->select(
                DB::raw('YEAR(k.tanggal) as year'),
                DB::raw('SUM(k.nominal * k.jumlah) as total'),
                'jen.jenis_kategori as kategori'
            )
            ->groupBy('year', 'kategori')
            ->orderBy('year')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        //
    }
}
