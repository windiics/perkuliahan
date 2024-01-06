<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//mahasiswas
Route::apiResource('/mahasiswas', App\Http\Controllers\Api\MahasiswaController::class);

//dosens
Route::apiResource('/dosens', App\Http\Controllers\Api\DosenController::class);

//mata_kuliahs
Route::apiResource('/mata_kuliahs', App\Http\Controllers\Api\MataKuliahController::class);

//prodis
Route::apiResource('/prodis', App\Http\Controllers\Api\ProdiController::class);