<?php

use App\Http\Controllers\AgamaApiController;
use App\Http\Controllers\AnggotakkApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\HubungankkApiController;
use App\Http\Controllers\KkApiController;
use App\Http\Controllers\PendudukApiController;
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

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

// Route yang membutuhkan otentikasi
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

// Route::get('agama', [AgamaApiController::class, 'index']);
// Route::get('agama/{id}', [AgamaApiController::class, 'show']);
// Route::post('agama', [AgamaApiController::class, 'store']);
// Route::put('agama/{id}', [AgamaApiController::class, 'update']);
// Route::delete('agama/{id}', [AgamaApiController::class, 'destroy']);
Route::apiResource('agama', AgamaApiController::class);

// Route::get('hubungankk', [HubungankkApiController::class, 'index']);
// Route::get('hubungankk/{id}', [HubungankkApiController::class, 'show']);
// Route::post('hubungankk', [HubungankkApiController::class, 'store']);
// Route::put('hubungankk/{id}', [HubungankkApiController::class, 'update']);
// Route::delete('hubungankk/{id}', [HubungankkApiController::class, 'destroy']);
Route::apiResource('hubungankk', HubungankkApiController::class);

// Route::get('kk', [KkApiController::class, 'index']);
// Route::get('kk/{id}', [KkApiController::class, 'show']);
// Route::post('kk', [KkApiController::class, 'store']);
// Route::put('kk/{id}', [KkApiController::class, 'update']);
// Route::delete('kk/{id}', [KkApiController::class, 'destroy']);
Route::apiResource('kk', KkApiController::class);

// Route::get('penduduk', [PendudukApiController::class, 'index']);
// Route::get('penduduk/{id}', [PendudukApiController::class, 'show']);
// Route::post('penduduk', [PendudukApiController::class, 'store']);
// Route::put('penduduk/{id}', [PendudukApiController::class, 'update']);
// Route::delete('penduduk/{id}', [PendudukApiController::class, 'destroy']);
Route::apiResource('penduduk', PendudukApiController::class);

// Route::get('anggotakk', [AnggotakkApiController::class, 'index']);
// Route::get('anggotakk/{id}', [AnggotakkApiController::class, 'show']);
// Route::post('anggotakk', [AnggotakkApiController::class, 'store']);
// Route::put('anggotakk/{id}', [AnggotakkApiController::class, 'update']);
// Route::delete('anggotakk/{id}', [AnggotakkApiController::class, 'destroy']);
Route::apiResource('anggotakk', AnggotakkApiController::class);
