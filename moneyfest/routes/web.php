<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\JenisKategorisController;
use App\Http\Controllers\API\KategorisController;
use App\Http\Controllers\KeuanganController;


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
    return view('welcome');
});

Route::get('/landing-click', function () {
    return view('landing_click');
});

Route::get('/landing-lead', function () {
    return view('landing_lead');
});

Route::get('/landing-mailchimp', function () {
    return view('landing_mailchimp');
});

Route::get('/login', [Controller::class, 'login']);
Route::post('/login', [Controller::class, 'login']);

Route::get('/register', [Controller::class, 'registerpage']);
Route::post('/register', [Controller::class, 'registerlogic']);

Route::get('/dashboard', [Controller::class, 'dashboard']);
Route::post('/dashboard', [Controller::class, 'tes']);

//jangan sentuh samsek yagais :)
Route::get('/api/jenis-kategoris', [JenisKategorisController::class, 'index']);
Route::get('/api/kategoris/{jenis}', [KategorisController::class, 'index']);
Route::get('/api/dashboard', [KeuanganController::class, 'index']);




