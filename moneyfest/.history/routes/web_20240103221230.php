<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\JenisKategorisController;
use App\Http\Controllers\API\KategorisController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
});


Route::get('/login', [Controller::class, 'login']);
Route::post('/login', [Controller::class, 'login']);

// Route::middleware(['web', 'auth'])->group(function () {

// });

Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/dashboard', [Controller::class, 'create_user']);

Route::get('/register', [Controller::class, 'registerpage']);
Route::post('/register', [Controller::class, 'registerlogic']);

Route::get('/stock', [Controller::class, 'stock']);
// Route::get('/profit', [Controller::class, 'keuntungan']);
// Route::get('/profit', function () {
//     return view('keuntungan');
// });
Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::get('/pemasukan', [Controller::class, 'pemasukan']);
Route::get('/pengeluaran', [Controller::class, 'pengeluaran']);
Route::post('/pemasukan', [Controller::class, 'tes']);
Route::post('/pengeluaran', [Controller::class, 'create_pengeluaran']);

Route::get('/histori/{histori}', [Controller::class, 'histori']);
Route::post('/histori/{histori}', [Controller::class, 'updateKeuangan']);

Route::get('/stok', [Controller::class, 'stok']);
Route::post('/stok', [Controller::class, 'updatestok']);

Route::get('/pegawai', [Controller::class, 'pegawai']);
Route::post('/pegawai', [Controller::class, 'updatepegawai']);


Route::post('/logout', [Controller::class, 'logout']);
Route::get('/logout', [Controller::class, 'logout']);


//jangan sentuh samsek yagais :)
Route::get('/profit', [Controller::class, 'tes_dashboard']);
Route::get('/api/jenis-kategoris', [JenisKategorisController::class, 'index']);
Route::get('/api/kategoris/{jenis}', [Controller::class, 'api_for_kategori']);
Route::get('/api/jenis-pengeluaran', [JenisKategorisController::class, 'pengeluaran']);

Route::get('/api/list-pengeluaran', [KeuanganController::class, 'pengeluaran']);
Route::get('/api/list-pemasukan', [KeuanganController::class, 'pemasukan']);
Route::get('/api/produk', [ProdukController::class, 'index']);
Route::get('/api/produk/{jual}/{jenis}', [ProdukController::class, 'produkspes']);
Route::get('/api/dashboard', [KeuanganController::class, 'api']);
Route::get('/api/dashboard2', [KeuanganController::class, 'api2']);
Route::get('/api/dashboard3/{date}/{quartil}', [KeuanganController::class, 'api3']);
