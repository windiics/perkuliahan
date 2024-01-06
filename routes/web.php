<?php

use App\Http\Controllers\Api\MataKuliahController;
use App\Http\Controllers\DosennController;
use App\Http\Controllers\MahasiswaaController;
use App\Http\Controllers\MataKuliahhController;
use App\Http\Controllers\ProdiiController;
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

Route::get('/', [App\Http\Controllers\HalamanController::class, 'index']);
Route::get('/kontak', [App\Http\Controllers\HalamanController::class, 'kontak']);
Route::get('/tentang', [App\Http\Controllers\HalamanController::class, 'tentang']);

Route::resource('mahasiswaa', MahasiswaaController::class);

Route::resource('dosenn', DosennController::class);

Route::resource('prodii', ProdiiController::class);

Route::resource('matakuliahh', MataKuliahhController::class);