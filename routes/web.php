<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// HANYA BISA DI AKSES ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/user', UserController::class);
    Route::get('/delus/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delus');
});

// Hanya bisa diakses editor dan admin
Route::middleware(['auth', 'editor'])->group(function () {
    Route::resource('/kategori', KategoriController::class);
    Route::get('/delkat/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('delkat');
    Route::resource('/produk', ProdukController::class);
    Route::get('/delpro/{produk}', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('delpro');
    Route::resource('/post', PostController::class);
    Route::get('/delpos/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delpos');
});

//bisa diakses siapa saja
Route::resource('/rekomendasi', RekomendasiController::class);
Route::resource('/', DashboardController::class);
Route::get('/dashboard/detail/{id}', [App\Http\Controllers\DashboardController::class, 'show'])->name('detail');