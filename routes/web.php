<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsulesController;

Route::get('/regristasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');

Route::get('/', [HomeController::class, 'index']);
Route::get('/consule', [HomeController::class, 'consule']);

// Definisi rute resource yang benar
Route::resource('consules', ConsuleController::class);
