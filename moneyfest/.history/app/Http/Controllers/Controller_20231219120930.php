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
            if($_POST['additionalDropdown'] != -1){
                $produk = Produk::findOrFail($_POST['additionalDropdown']);
                if($_POST['url'] == 'pemasukan'){
                    $produk->update([
                        'stok' => $produk->stok - $_POST['jumlah'],
                        'terjual' => $produk->terjual + $_POST['jumlah'],
                    ]);
                }else if($_POST['url'] == 'pengeluaran'){
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

        $result = DB::table('keuangans as k')
            ->select(
                DB::raw('YEAR(k.tanggal) AS tahun'),
                DB::raw('MONTH(k.tanggal) AS bulan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "iklan" THEN k.nominal * k.jumlah ELSE 0 END) AS iklan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "penjualan produk" THEN k.nominal * k.jumlah ELSE 0 END) AS penjualan_produk'),
                DB::raw('SUM(CASE WHEN kat.kategori = "royalti" THEN k.nominal * k.jumlah ELSE 0 END) AS royalti'),
                DB::raw('SUM(CASE WHEN kat.kategori = "lisensi" THEN k.nominal * k.jumlah ELSE 0 END) AS lisensi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "donasi" THEN k.nominal * k.jumlah ELSE 0 END) AS donasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "langganan" THEN k.nominal * k.jumlah ELSE 0 END) AS langganan'),
                DB::raw('SUM(CASE WHEN kat.kategori = "afiliasi" THEN k.nominal * k.jumlah ELSE 0 END) AS afiliasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "layanan konsultasi" THEN k.nominal * k.jumlah ELSE 0 END) AS layanan_konsultasi'),
                DB::raw('SUM(CASE WHEN kat.kategori = "penjualan aset" THEN k.nominal * k.jumlah ELSE 0 END) AS penjualan_aset'),
                DB::raw('SUM(CASE WHEN kat.kategori = "lain-lain" THEN k.nominal * k.jumlah ELSE 0 END) AS lain_lain'),
                DB::raw('SUM(k.nominal * k.jumlah) AS total')
            )
            ->join('kategoris as kat', 'k.kategori', '=', 'kat.id')
            ->join('jenis__kategoris as jen', 'kat.id_jenis_kategori', '=', 'jen.id')
            ->where('jen.jenis_kategori', '=', 'pendapatan')
            ->groupBy('tahun', 'bulan')
            ->orderByDesc('tahun')
            ->orderByDesc('bulan')
            ->get();
        
        //jadikan setiap kategori sebagai attribute
        // $orders = Keuangan::select(
        //     DB::raw('Keuangans.*'),
        //     DB::raw('SUM(Keuangans.nominal*Keuangans.jumlah) as total'),  
        //     DB::raw("DATE_FORMAT(tanggal,'%M %Y') as months"),
        //     DB::raw("DATE_FORMAT(tanggal,'%m') as monthKey")
        // )
        // ->groupBy('months', 'monthKey', 'id', 'created_at', 'updated_at', 'nama', 'nominal', 'kategori', 'jumlah', 'satuan', 'tanggal', 'catatan', 'user_id')
        // ->orderBy('tanggal', 'ASC')
        // ->get();

        $traindata = [];
        $target = [];
        $temp = 0.00001;
        $a = 1;
        foreach ($result as $row) {
            $container = [];
            $i = 0;
            foreach ($row as $item){
                if($i == 12){
                    $target[] = (float  )$item +$a;
                }else if($i > 1){
                    $container[] =(float) $item + $a;
                }
                $i++;
            }
            for($x=0; $x < count($container); $x++) {
                if($container[$x] == 0){
                    $container[$x] = $temp;
                    $temp += $temp;
                }
                
            }
            $traindata[] = $container;
        }
        
        
//         $normalizer = new Normalizer();
// $normalizer->fit($traindata);
// $traindata = $normalizer->transform($traindata);
        
        $regression = new LeastSquares();
        $features = [[1,2], [3,4], [5,6], [7,8], [9,10], [11,12], [13,14], [15,16], [17,18], [19,20], [21,22], [23,24]];
        foreach ($result as $row) {
            $container = [];
            $i = 0;
            foreach ($row as $item){
                $container[]
            }
            for($x=0; $x < count($container); $x++) {
                if($container[$x] == 0){
                    $container[$x] = $temp;
                    $temp += $temp;
                }
                
            }
            $traindata[] = $container;
        }
        $regression->train(, [1,2,3,4,5,6,7,8,9,10,11,12]);
        
        // $predictions = $regression->predict([2,3000000]);
        //predict which category that is used
        // 0 1 0 1 0 and smt
        
        return view('tes_dashboard', [
            'user' => $user,
            'result' => $result,
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
        if(isset($_POST['additionalDropdown'])){
            if($_POST['additionalDropdown'] != -1){
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
        if(isset($_POST['additionalDropdown'])){
            if($_POST['additionalDropdown'] != -1){
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
