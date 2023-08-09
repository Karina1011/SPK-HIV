<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\DataTentangController;
use App\Http\Controllers\RiwayatDiagnosaController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// login
// Route::middleware(['guest'])->group(function () {
//     Route::get('/',  [LoginController::class, 'login'])->name('login');
//     Route::post('/',  [LoginController::class, 'sesilogin']);  
// });

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard',  [dashboardController::class, 'dashboard']);
    Route::get('/logout', [LoginController::class, 'logout']);  
    
});

// layout pasien

//tutorial
Route::get('/tutorial_apk', [DashboardController::class, 'tutorial_apk'])->name('pasien.layouts');

//data tentang
Route::get('/tentang_apk', [DashboardController::class, 'tentang_apk']);

//edukasi seks
Route::get('/edukasi_seks', [DashboardController::class, 'edukasi_seks']);
Route::resource('/edukasi',  \App\Http\Controllers\EdukasiController::class);
Route::get('/edukasi/detail/{id}', [DashboardController::class, 'detail'])->name('edukasi.detail');

//Beranda
Route::get('/', [DashboardController::class, 'beranda'])->name('pasien.layouts.beranda');

//Riwayat Diagnosa
Route::get('/riwayat', [RiwayatDiagnosaController::class, 'index'])->name('riwayat.index');
Route::delete('/riwayat/{id}', [RiwayatDiagnosaController::class, 'destroy'])->name('riwayat.destroy');
Route::get('/riwayat/{id}/edit', [RiwayatDiagnosaController::class, 'edit'])->name('riwayat.edit');
Route::get('/riwayat/{id}/detail', [RiwayatDiagnosaController::class, 'showDetail'])->name('riwayat.showDetail');
Route::get('/riwayat/unduh-detail/{id}', [RiwayatDiagnosaController::class, 'unduhDetailRiwayat'])->name('riwayat.unduhDetail');

// Diagnosa
Route::get('/diagnosa', [DiagnosisController::class, 'index'])->name('diagnosa.index');
Route::post('/diagnosa', [DiagnosisController::class, 'proses'])->name('diagnosa.proses');
Route::get('/diagnosa/hasil', [DiagnosisController::class, 'hasil'])->name('diagnosa.hasil');
Route::get('/diagnosa/hasil/download-pdf', [DiagnosisController::class, 'unduhPDF'])->name('diagnosa.hasil.download');


//data_pasien
Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/pasien/daftar', [PasienController::class, 'daftar'])->name('pasien.daftar');

//aturan
Route::resource('/rule', \App\Http\Controllers\RuleController::class);
Route::get("/rule/edit", [RuleController::class, "edit"]);
Route::put("/rule/simpan", [RuleController::class, "update"]);

// layout admin
Route::resource('/gejala',  \App\Http\Controllers\GejalaController::class);

// Route::resource('/stadium', \App\Http\Controllers\StadiumController::class);

Route::resource('/penyakit',  \App\Http\Controllers\PenyakitController::class);

Route::resource('/tentang',  \App\Http\Controllers\DataTentangController::class);

Route::resource('/tutorial',  \App\Http\Controllers\TutorialController::class);

Route::resource('/pengguna',  \App\Http\Controllers\PenggunaController::class);

Route::get('/profil', [dashboardController::class, 'profil']);

// tambah users
// Route::get('/users', 'UserController@index');
// Route::get('/users/create', 'UserController@create');
// Route::post('/users', 'UserController@store');
// Route::get('/users/{id}/edit', 'UserController@edit');
// Route::put('/users/{id}', 'UserController@update');
// Route::delete('/users/{id}', 'UserController@destroy');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
