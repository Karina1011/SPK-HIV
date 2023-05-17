<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pasien/layouts/home');
});

Route::get('/pasien/layouts/tentang', [dashboardController::class, 'tentang']);
Route::get('/pasien/layouts/edukasi', [dashboardController::class, 'edukasi']);

//======Gejala=====
Route::resource('/gejala', \App\Http\Controllers\GejalaController::class);

Route::resource('/stadium', \App\Http\Controllers\StadiumController::class);

// Route::get("/edit", [PenyakitController::class, "edit"]);
// Route::put("/simpan/{id}", [PenyakitController::class, "update"]);
Route::resource('/penyakit',  \App\Http\Controllers\PenyakitController::class);
// // Route::get('/admin/penyakit/edit', \App\Http\Controllers\PenyakitController::class, 'edit');
// // Route::get('/penyakit', \App\Http\Controllers\PenyakitController::class);
// // Route::resource('/penyakit', \App\Http\Controllers\PenyakitController::class);

// Route::get("/admin/penyakit/edit", [PenyakitControllers::class, "edit"]);
// Route::get("/admin/penyakit/simpan", [PenyakitControllers::class, "update"]);
// Route::resource("/penyakit", PenyakitControllers::class);
// Route::get("/penyakit/{id}", [PenyakitControllers::class, "destroy"]);

// Route::get('tambah-penyakit', function () {
//     return view('admin/stadium/create');
// });
Route::get('user', function () {
    return view('admin/user');
});
Route::get('data-admin', function () {
    return view('admin/data-admin');
});
// Bagian-Pengguna

Route::get('index', function () {
    return view('pasien/main');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
