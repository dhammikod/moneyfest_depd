<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function api(){
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

            return response()->json($results);
    }

    public function pengeluaran()
    {
        $userId = session('user_id');

        $keuangans = Keuangan::select(
                'keuangans.id',
                'keuangans.nama',
                'keuangans.nominal',
                'keuangans.jumlah',
                'keuangans.satuan',
                'keuangans.tanggal',
                'keuangans.user_id',
                'jenis__kategoris.jenis_kategori',
                'kategoris.kategori'
            )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->where('keuangans.user_id', $userId)
            ->where('jenis_kategori', 'pengeluaran')
            ->get();
        return response()->json($keuangans);
    }

    public function pemasukan()
    {
        $userId = session('user_id');

        $keuangans = Keuangan::select(
                'keuangans.id',
                'keuangans.nama',
                'keuangans.nominal',
                'keuangans.jumlah',
                'keuangans.satuan',
                'keuangans.tanggal',
                'keuangans.user_id',
                'jenis__kategoris.jenis_kategori',
                'kategoris.kategori'
            )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->where('keuangans.user_id', $userId)
            ->where('jenis_kategori', 'pendapatan')
            ->get();
        return response()->json($keuangans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeuanganRequest $request)
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
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan)
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
