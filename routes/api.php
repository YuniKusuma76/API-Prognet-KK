<?php

use App\Http\Controllers\AgamaApiController;
use App\Http\Controllers\AnggotakkApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\HubungankkApiController;
use App\Http\Controllers\KkApiController;
use App\Http\Controllers\PendudukApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('all-user', [UserApiController::class, 'getUser']);

Route::apiResource('agama', AgamaApiController::class);

Route::apiResource('hubungankk', HubungankkApiController::class);

Route::apiResource('kk', KkApiController::class);

Route::apiResource('penduduk', PendudukApiController::class);

Route::apiResource('anggotakk', AnggotakkApiController::class);
