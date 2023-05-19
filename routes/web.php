<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/',  [LoginController::class, 'login'])->name('login');
    Route::post('/',  [LoginController::class, 'sesilogin']);  
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard',  [dashboardController::class, 'dashboard']);
    Route::get('/logout', [LoginController::class, 'logout']);  
});

Route::get('/pasien/layouts/tentang', [dashboardController::class, 'tentang']);
Route::get('/pasien/layouts/edukasi', [dashboardController::class, 'edukasi']);


//======Gejala=====
Route::resource('/gejala',  \App\Http\Controllers\GejalaController::class);

Route::resource('/stadium', \App\Http\Controllers\StadiumController::class);

Route::resource('/penyakit',  \App\Http\Controllers\PenyakitController::class);



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
