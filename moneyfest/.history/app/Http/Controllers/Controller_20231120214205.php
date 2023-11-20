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
        if (!Session::has('user_id')) {
            return redirect()->to('/login');
        }
        $user = User::where('id', session('user_id'))->first();

        return view('dashboard', [
            'user' => $user,
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
    public function stok(){
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

    public function pegawai(){
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
        if(isset($_POST['additionalDropdown'])){
            $produk = Produk::findOrFail($_POST['additionalDropdown']);
            $produk->update([
                'stok' => $_POST['catatan'],
            ]);
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
