<?php

use Illuminate\Support\Facades\Route;

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

