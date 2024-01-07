<?php

use App\Http\Controllers\AgamaApiController;
use App\Http\Controllers\AnggotakkApiController;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\HubungankkApiController;
use App\Http\Controllers\KkApiController;
use App\Http\Controllers\PendudukApiController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::get('/user', 'UserController')->middleware('auth:sanctum');

Route::apiResource('agama', AgamaApiController::class);

Route::apiResource('hubungankk', HubungankkApiController::class);

Route::apiResource('kk', KkApiController::class);

Route::apiResource('penduduk', PendudukApiController::class);

Route::apiResource('anggotakk', AnggotakkApiController::class);
