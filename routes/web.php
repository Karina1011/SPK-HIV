<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\DiagnosaController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/',  [LoginController::class, 'login'])->name('login');
    Route::post('/',  [LoginController::class, 'sesilogin']);  
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard',  [dashboardController::class, 'dashboard']);
    Route::get('/logout', [LoginController::class, 'logout']);  
});

// layout pasien
Route::get('/tentang', [dashboardController::class, 'tentang']);
Route::get('/edukasi_seks', [dashboardController::class, 'edukasi_seks']);
Route::get('/tutorial', [dashboardController::class, 'tutorial']);
Route::get('/beranda', [dashboardController::class, 'beranda']);
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa');
Route::post('/diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa');


// layout admin
Route::resource('/gejala',  \App\Http\Controllers\GejalaController::class);

Route::resource('/stadium', \App\Http\Controllers\StadiumController::class);

Route::resource('/penyakit',  \App\Http\Controllers\PenyakitController::class);

Route::resource('/edukasi',  \App\Http\Controllers\EdukasiController::class);

Route::get('/profil', [dashboardController::class, 'profil']);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
