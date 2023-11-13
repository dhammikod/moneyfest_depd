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


use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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
        
        return view('dashboard', [
            'user' => $user,
            'kategories_sum' => $kategories_sum,
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
        $tabel_kiri_atas = $userId = 1; // Replace with the actual user ID        
        
        return view('dashboard', [
            'user' => $user,
        ]);
    }

    public function create_pengeluaran()
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
        return view('pengeluaran', [
            'user' => $user,
        ]);
    }
}
