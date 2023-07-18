<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DataTentangController;
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
// // Route::get('/detail', \App\Http\Controllers\DashboardController::class, 'detail');
// Route::get('/edukasi/{id}', [EdukasiController::class, 'detail'])->name('edukasi.detail');

// Route::get('/detail', [DashboardController::class, 'detail'])->name('pasien.layouts');

Route::get('/', [DashboardController::class, 'beranda'])->name('pasien.layouts.beranda');

//Diagnosa
// routes/web.php

// Route::get('/diagnosa', 'DiagnosaController@index')->name('diagnosa.index');
// Route::post('/diagnosa', 'DiagnosaController@store')->name('diagnosa.store');
Route::post('/diagnosa/proses', [DiagnosaController::class, 'proses'])->name('diagnosa.proses');
Route::get('/layouts/diagnosa/{id?}', [DiagnosaController::class, 'index'])->name('layouts.diagnosa.index');
Route::get('/layouts/diagnosa/hasil', [DiagnosaController::class, 'hasil'])->name('layouts.diagnosa.hasil');
Route::get('/download-pdf/{id}', [DiagnosaController::class, 'downloadPDF'])->name('download.pdf');
Route::get('/diagnosa/selesai', [DiagnosaController::class, 'selesai'])->name('diagnosa.selesai');

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
