<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Jenis_Kategori;
use App\Models\Kategori;
use App\Models\Pegawai;
use App\Models\Produk;
use Illuminate\Routing\Controller as BaseController;
use Phpml\Regression\LeastSquares;
use Phpml\Preprocessing\Normalizer;

use Phpml\Regression\Ridge;

// use Phpml\Classification\Ensemble\RandomForest;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function updateKeuangan($route)
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $keuangan = Keuangan::findOrFail($id);
            $keuangan->delete();
            return redirect()->to('/histori/' . $route);
        } elseif (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $keuangan = Keuangan::findOrFail($id);

            $keuangan->update([
                'nama' => $_POST['nama'],
                'nominal' => $_POST['nominal'],
                'kategori' => $_POST['kategori'],
                'jumlah' => $_POST['jumlah'],
                'tanggal' => $_POST['tanggal'],
                'satuan' => $_POST['satuan'],
                'catatan' => $_POST['catatan'],
            ]);
            return redirect()->to('/histori/' . $route);
        } elseif (isset($_POST['create'])) {
            $user = User::where('id', session('user_id'))->first();
            if ($_POST['additionalDropdown'] != -1) {
                $produk = Produk::findOrFail($_POST['additionalDropdown']);
                if ($_POST['url'] == 'pemasukan') {
                    $produk->update([
                        'stok' => $produk->stok - $_POST['jumlah'],
                        'terjual' => $produk->terjual + $_POST['jumlah'],
                    ]);
                } else if ($_POST['url'] == 'pengeluaran') {
                    $produk->update([
                        'stok' => $produk->stok + $_POST['jumlah'],
                    ]);
                }
            }

            $keuangan = Keuangan::create([
                'nama' => $_POST['name'],
                'nominal' => $_POST['nominal'],
                'kategori' => $_POST['kategori'],
                'jumlah' => $_POST['jumlah'],
                'tanggal' => Carbon::parse($_POST['tanggal']),
                'satuan' => $_POST['satuan'],
                'catatan' => $_POST['catatan'],
                'user_id' => $_POST['user_id'],
            ]);
            return redirect()->to('/histori/' . $route);
        } else {
            return redirect()->back()->with('error', 'wrong usage');
        }
    }

    public function updatestok()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $produk = Produk::findOrFail($id);
            $produk->delete();
            return redirect()->to('/stok');
        } elseif (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $produk = Produk::findOrFail($id);
            $produk->update([
                'nama' => $_POST['nama'],
                'jenis' => $_POST['jenis'],
                'deskripsi' => $_POST['deskripsi'],
                'stok' => $_POST['stok'],
                'harga_jual' => $_POST['harga_jual'],
                'harga_beli' => $_POST['harga_beli'],
                'terjual' => $_POST['terjual'],
            ]);
            return redirect()->to('/stok');
        } elseif (isset($_POST['create'])) {
            $user = User::where('id', session('user_id'))->first();
            $produk = Produk::create([
                'nama' => $_POST['nama'],
                'jenis' => $_POST['jenis'],
                'deskripsi' => $_POST['deskripsi'],
                'stok' => $_POST['stok'],
                'harga_jual' => $_POST['harga_jual'],
                'harga_beli' => $_POST['harga_beli'],
                'terjual' => $_POST['terjual'],
                'user_id' => $_POST['user_id'],
            ]);
            return redirect()->to('/stok');
        } else {
            return redirect()->back()->with('error', 'wrong usage');
        }
    }

    public function updatepegawai()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $produk = Pegawai::findOrFail($id);
            $produk->delete();
            return redirect()->to('/pegawai');
        } elseif (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $produk = Pegawai::findOrFail($id);
            $produk->update([
                'nama' => $_POST['nama'],
                'job_desc' => $_POST['job_desc'],
                'gaji' => $_POST['gaji'],
            ]);
            return redirect()->to('/pegawai');
        } elseif (isset($_POST['create'])) {
            $user = User::where('id', session('user_id'))->first();
            $produk = Pegawai::create([
                'nama' => $_POST['nama'],
                'job_desc' => $_POST['job_desc'],
                'gaji' => $_POST['gaji'],
                'user_id' => $_POST['user_id'],
            ]);
            return redirect()->to('/pegawai');
        } else {
            return redirect()->back()->with('error', 'wrong usage');
        }
    }
    public function histori($histori)
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }

        $user = User::where('id', session('user_id'))->first();
        if ($histori == "pengeluaran") {
            // $uri = '/api/list-pengeluaran';
            $data = "pengeluaran";
            $kategoris = Kategori::where('id_jenis_kategori', 1)->get();
        } elseif ($histori == "pemasukan") {
            // $uri = '/api/list-pemasukan';
            $data = "pendapatan";
            $kategoris = Kategori::where('id_jenis_kategori', 2)->get();
        } else {
            return "404 wrong usage";
        }

        $keuangans = Keuangan::select(
            'keuangans.id',
            'keuangans.nama',
            'keuangans.nominal',
            'keuangans.jumlah',
            'keuangans.satuan',
            'keuangans.tanggal',
            'keuangans.catatan',
            'keuangans.user_id',
            'jenis__kategoris.jenis_kategori',
            'kategoris.kategori'
        )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->where('keuangans.user_id', session('user_id'))
            ->where('jenis_kategori', $data)
            ->get();

        return view('histori', [
            'user' => $user,
            'datas' => $keuangans,
            'kategoris' => $kategoris,
            'url' => $histori,
        ]);
    }

    public function login()
    {
        if (Session::has('user_id')) {
            return redirect()->to('/dashboard');
        }

        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $user = User::where('email', $_POST["email"])->first();

            if ($user && Hash::check($_POST["password"], $user->password)) {
                session(['user_id' => $user->id]);

                return redirect()->to('/dashboard');
            }

            return view('login', [
                'pagetitle' => 'Home',
                'invalid' => true,
            ]);
        }

        return view('login', [
            'pagetitle' => 'Home',
            'invalid' => false,
        ]);
    }

    public function registerpage()
    {
        return view('register', [
            'pagetitle' => 'Home',
            'invalid' => false,
        ]);
    }

    public function registerlogic()
    {
        $user = User::where('email', $_POST["email"])->first();
        $errors = [];

        if ($user != null) {
            array_push($errors, "Email already registered");
        }

        if ($_POST['repassword'] != $_POST['password']) {
            array_push($errors, "Password does not match");
        }

        if (!empty($errors)) {
            return view('register', [
                'pagetitle' => 'Home',
                'invalid' => true,
                'error_msg' => $errors,
            ]);
        }

        $user = User::create([
            'name' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => Hash::make($_POST['password']),
        ]);
        session(['user_id' => $user->id]);
        return redirect()->to('/dashboard');
    }

    public function dashboard()
    {
        $result = Keuangan::select('keuangans.*', 'jenis__kategoris.jenis_kategori AS kategori')
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->orderByDesc('keuangans.tanggal')
            ->where('keuangans.user_id', session('user_id'))
            ->limit(5)
            ->get();

        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        return view('dashboard', [
            'user' => $user,
            'transactions' => $result,
        ]);
    }

    public function tes_dashboard()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }

        $user = User::where('id', session('user_id'))->first();

        //cari if there is a model

        //if exist return page with prediction
        //if not, make prediction then return model with prediction

        $result = DB::table('keuangans as k')
            ->join('kategoris as kat', 'k.kategori', '=', 'kat.id')
            ->join('jenis__kategoris as jen', 'kat.id_jenis_kategori', '=', 'jen.id')
            ->select(
                DB::raw('YEAR(k.tanggal) as tahun'),
                DB::raw('MONTH(k.tanggal) as bulan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "iklan" THEN k.nominal * k.jumlah ELSE 0 END) as iklan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "penjualan produk" THEN k.nominal * k.jumlah ELSE 0 END) as penjualan_produk'),
                DB::raw('SUM(CASE WHEN kat.kategori = "royalti" THEN k.nominal * k.jumlah ELSE 0 END) as royalti'),
                DB::raw('SUM(CASE WHEN kat.kategori = "lisensi" THEN k.nominal * k.jumlah ELSE 0 END) as lisensi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "donasi" THEN k.nominal * k.jumlah ELSE 0 END) as donasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "langganan" THEN k.nominal * k.jumlah ELSE 0 END) as langganan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "afiliasi" THEN k.nominal * k.jumlah ELSE 0 END) as afiliasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "layanan konsultasi" THEN k.nominal * k.jumlah ELSE 0 END) as layanan_konsultasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "penjualan aset" THEN k.nominal * k.jumlah ELSE 0 END) as penjualan_aset'),
                DB::raw('SUM(CASE WHEN kat.kategori = "lain-lain" THEN k.nominal * k.jumlah ELSE 0 END) as lain_lain'),
                DB::raw('SUM(k.nominal * k.jumlah) as total')
            )
            ->where('jen.jenis_kategori', 'pendapatan')
            ->where('k.user_id', 1)
            ->groupBy('tahun', 'bulan')
            ->orderByDesc('tahun')
            ->orderByDesc('bulan')
            ->limit(3)
            ->get();


        // $traindata = [];
        // $target = [];
        // $temp = 0.00001;
        // $a = 1;
        $iklan = [];
        $penjualan_produk     = [];
        $royalti = [];
        $lisensi = [];
        $donasi = [];
        $langganan = [];
        $afiliasi = [];
        $layanan_konsultasi = [];
        $penjualan_aset = [];
        $lain_lain = [];
        $total = [];


        foreach ($result as $row) {
            $iklan[] = $row->iklan;
            $penjualan_produk[] = $row->penjualan_produk;
            $royalti[] = $row->royalti;
            $lisensi[] = $row->lisensi;
            $donasi[] = $row->donasi;
            $langganan[] = $row->langganan;
            $afiliasi[] = $row->afiliasi;
            $layanan_konsultasi[] = $row->layanan_konsultasi;
            $penjualan_aset[] = $row->penjualan_aset;
            $lain_lain[] = $row->lain_lain;
            $total[] = $row->total;
        }
        $sum = array_sum($total);
        $average_total = $sum / count($total);

        $prediction = 0;
        if ($total[2] >= $average_total) {
            $prediction = $total[2] * 110 / 100;
            $iklan[2] = $iklan[2] * 110/100;
            $penjualan_produk[2]     = $penjualan_produk[2] * 110/100;
            $royalti[2] = $royalti[2] * 110/100;
            $lisensi[2] = $lisensi[2] * 110/100;
            $donasi[2] = $donasi[2] * 110/100;
            $langganan[2] = $langganan[2] * 110/100;
            $afiliasi[2] = $afiliasi[2] * 110/100;
            $layanan_konsultasi[2] = $layanan_konsultasi[2] * 110/100;
            $penjualan_aset[2] = $penjualan_aset[2] * 110/100;
            $lain_lain[2] = $lain_lain[2] * 110/100;
        } else {
            $prediction = $total[2] * 90 / 100;
            $iklan[2] = $iklan[2] * 90/100;
            $penjualan_produk[2]  = $penjualan_produk[2] * 90/100;
            $royalti[2] = $royalti[2] * 90/100;
            $lisensi[2] = $lisensi[2] * 90/100;
            $donasi[2] = $donasi[2] * 90/100;
            $langganan[2] = $langganan[2] * 90/100;
            $afiliasi[2] = $afiliasi[2] * 90/100;
            $layanan_konsultasi[2] = $layanan_konsultasi[2] * 90/100;
            $penjualan_aset[2] = $penjualan_aset[2] * 90/100;
            $lain_lain[2] = $lain_lain[2] * 90/100;
        }

        $equation = "";

        $iklanIsZero = isset($iklan[2]) && $iklan[2] == 0;
        $penjualanProdukIsZero = isset($penjualan_produk[2]) && $penjualan_produk[2] == 0;
        $lisensiIsZero = isset($lisensi[2]) && $lisensi[2] == 0;
        $royaltiIsZero = isset($royalti[2]) && $royalti[2] == 0;
        $donasiIsZero = isset($donasi[2]) && $donasi[2] == 0;
        $langgananIsZero = isset($langganan[2]) && $langganan[2] == 0;
        $afiliasiIsZero = isset($afiliasi[2]) && $afiliasi[2] == 0;
        $layananKonsultasiIsZero = isset($layanan_konsultasi[2]) && $layanan_konsultasi[2] == 0;
        $penjualanAsetIsZero = isset($penjualan_aset[2]) && $penjualan_aset[2] == 0;
        $lainLainIsZero = isset($lain_lain[2]) && $lain_lain[2] == 0;

        if (!$iklanIsZero) {
            $equation = $equation . "iklan: ".str($iklan[2]);
        }
        if (!$penjualanProdukIsZero) {
            $equation = $equation . "penjualan_produk: ".str($penjualan_produk[2]);
        }
        if (!$lisensiIsZero) {
            $equation = $equation . "lisensi, ".str($royalti[2]);
        }
        if (!$royaltiIsZero) {
            $equation = $equation . "royalti, ".str($lisensi[2]);
        }
        if (!$donasiIsZero) {
            $equation = $equation . "donasi, ".str($donasi[2]);
        }
        if (!$langgananIsZero) {
            $equation = $equation . "langganan, ".str($langganan[2]);
        }
        if (!$afiliasiIsZero) {
            $equation = $equation . "afiliasi, ".str($afiliasi[2]);
        }
        if (!$layananKonsultasiIsZero) {
            $equation = $equation . "layanan konsultasi, ".str($layanan_konsultasi[2]);
        }
        if (!$penjualanAsetIsZero) {
            $equation = $equation . "penjualan aset, ".str($penjualan_aset[2]);
        }
        if (!$lainLainIsZero) {
            $equation = $equation . "lain-lain, ".str($lain_lain[2]);
        }

        return view('tes_dashboard', [
            'user' => $user,
            'result' => $result,
            'prediction' => $prediction,
            'equation' => $equation
            // 'traindata' => $traindata,
            // 'target' => $target
            // 'prediction' => $predictions,
            // 'by_month' => $orders,
        ]);
    }

    public function pemasukan()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        $kategories_sum = Keuangan::select(
            'kategoris.kategori',
            DB::raw('SUM(keuangans.nominal * keuangans.jumlah) AS total_category')
        )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->where('keuangans.user_id', session('user_id'))
            ->where('jenis__kategoris.jenis_kategori', 'pendapatan')
            ->groupBy('kategoris.kategori')
            ->get();

        return view('pemasukan', [
            'user' => $user,
            'kategories_sum' => $kategories_sum,
        ]);
    }
    public function stok()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        $produks = Produk::where('user_id', session('user_id'))->get();

        return view('stok', [
            'user' => $user,
            'produks' => $produks,
        ]);
    }

    public function pegawai()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        $pegawais = Pegawai::where('user_id', session('user_id'))->get();

        return view('pegawai', [
            'user' => $user,
            'pegawais' => $pegawais,
        ]);
    }
    public function pengeluaran()
    {
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        $kategories_sum = Keuangan::select(
            'kategoris.kategori',
            DB::raw('SUM(keuangans.nominal * keuangans.jumlah) AS total_category')
        )
            ->join('kategoris', 'keuangans.kategori', '=', 'kategoris.id')
            ->join('jenis__kategoris', 'kategoris.id_jenis_kategori', '=', 'jenis__kategoris.id')
            ->where('keuangans.user_id', session('user_id'))
            ->where('jenis__kategoris.jenis_kategori', 'pengeluaran')
            ->groupBy('kategoris.kategori')
            ->get();


        return view('pengeluaran', [
            'user' => $user,
            'kategories_sum' => $kategories_sum,
        ]);
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect()->to('/');
    }

    public function tes()
    {
        if (isset($_POST['additionalDropdown'])) {
            if ($_POST['additionalDropdown'] != -1) {
                $produk = Produk::findOrFail($_POST['additionalDropdown']);
                $produk->update([
                    'stok' => $produk->stok - $_POST['jumlah'],
                    'terjual' => $produk->terjual + $_POST['jumlah'],
                ]);
            }
        }

        $user = User::where('id', session('user_id'))->first();
        $keuangan = Keuangan::create([
            'nama' => $_POST['name'],
            'nominal' => $_POST['nominal'],
            'kategori' => $_POST['kategori'],
            'jumlah' => $_POST['jumlah'],
            'tanggal' => Carbon::parse($_POST['tanggal']),
            'satuan' => $_POST['satuan'],
            'catatan' => $_POST['catatan'],
            'user_id' => $_POST['user_id'],
        ]);
        return redirect()->to('/pemasukan');
    }

    public function create_pengeluaran()
    {
        if (isset($_POST['additionalDropdown'])) {
            if ($_POST['additionalDropdown'] != -1) {
                $produk = Produk::findOrFail($_POST['additionalDropdown']);
                $produk->update([
                    'stok' => $produk->stok + $_POST['jumlah'],
                ]);
            }
        }

        $user = User::where('id', session('user_id'))->first();
        $keuangan = Keuangan::create([
            'nama' => $_POST['name'],
            'nominal' => $_POST['nominal'],
            'kategori' => $_POST['kategori'],
            'jumlah' => $_POST['jumlah'],
            'tanggal' => Carbon::parse($_POST['tanggal']),
            'satuan' => $_POST['satuan'],
            'catatan' => $_POST['catatan'],
            'user_id' => $_POST['user_id'],
        ]);
        return redirect()->to('/pengeluaran');
    }
}
