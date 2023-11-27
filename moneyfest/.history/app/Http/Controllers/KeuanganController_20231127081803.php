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
    public function api()
    {
        $userId = session('user_id');

        $results = DB::table('keuangans as k')
            ->join('kategoris as kat', 'k.kategori', '=', 'kat.id')
            ->join('jenis__kategoris as jen', 'kat.id_jenis_kategori', '=', 'jen.id')
            ->select(
                'k.user_id',
                DB::raw('YEAR(k.tanggal) as year'),
                DB::raw('SUM(k.nominal * k.jumlah) as total'),
                'jen.jenis_kategori as kategori'
            )
            ->where('user_id', $userId)
            ->groupBy('user_id', 'year', 'kategori')
            ->orderBy('user_id')
            ->orderBy('year')
            ->get();


        return response()->json($results);
    }

    public function api2()
    {
        $userId = session('user_id');

        $results = DB::table('keuangans')
            ->select(
                DB::raw("CONCAT(MONTHNAME(tanggal), ' ', YEAR(tanggal)) AS tanggal"),
                DB::raw("DATE_FORMAT(tanggal, '%m-%Y') AS value"),
                'user_id'
            )
            ->distinct()
            ->where('keuangans.user_id', $userId)
            ->orderByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->get();


        return response()->json($results);
    }

    public function api3($date, $quartil)
    {
        $userId = session('user_id');

        $month = substr($date, 0, 3);
        $year = substr($date, -4);
        if (($quartil < 1 || $quartil > 3) || !preg_match('/^\d{2}-\d{4}$/', $date)) {
            return ('wrong usage');
        }

        if ($quartil == 1) {
            $end = 11;
            $start = 0;
        } else if ($quartil == 2) {
            $end = 21;
            $start = 10;
        } else {
            $end = 32;
            $start = 20;
        }
        $results = Keuangan::select(
            DB::raw('YEAR(tanggal) as year'),
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('DAY(tanggal) as day'),
            'tanggal',
            DB::raw('SUM(CASE WHEN jenis__kategoris.jenis_kategori = "pengeluaran" THEN nominal * jumlah ELSE 0 END) as pengeluaran'),
            DB::raw('SUM(CASE WHEN jenis__kategoris.jenis_kategori = "pendapatan" THEN nominal * jumlah ELSE 0 END) as pemasukan'),
            'user_id'
        )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->whereMonth('tanggal', '=', $month)
            ->whereYear('tanggal', '=', $year)
            ->whereDay('tanggal', '<', $end)
            ->whereDay('tanggal', '>', $start)
            ->where('keuangans.user_id', $userId)
            ->groupBy('year', 'month', 'day', 'tanggal', 'user_id')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('day')
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
