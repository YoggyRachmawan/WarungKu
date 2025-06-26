<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\NotaBelanjaController;
use App\Http\Controllers\HargaProdukController;
use App\Http\Controllers\KatalogProdukController;
use App\Http\Controllers\SatuanProdukController;
use App\Http\Controllers\TempatBelanjaController;

// Auth
Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['check'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
});

// Beranda
Route::middleware(['check'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index']);
});

// Nota Belanja //
Route::middleware(['check'])->group(function () {
    Route::get('/daftarNotaBelanja', [NotaBelanjaController::class, 'index']);
    Route::get('/formTambahNotaBelanja', [NotaBelanjaController::class, 'create']);
    Route::post('/inputNotaBelanja', [NotaBelanjaController::class, 'store']);
    Route::get('/formEditNotaBelanja/{id}', [NotaBelanjaController::class, 'edit']);
    Route::post('/editNotaBelanja/{id}', [NotaBelanjaController::class, 'update']);
    Route::get('/hapusNotaBelanja/{id}', [NotaBelanjaController::class, 'destroy']);
});

// Tempat Belanja //
Route::middleware(['check'])->group(function () {
    Route::get('/daftarTempatBelanja', [TempatBelanjaController::class, 'index']);
    Route::get('/formTambahTempatBelanja', [TempatBelanjaController::class, 'create']);
    Route::post('/inputTempatBelanja', [TempatBelanjaController::class, 'store']);
    Route::get('/formEditTempatBelanja/{id}', [TempatBelanjaController::class, 'edit']);
    Route::post('/editTempatBelanja/{id}', [TempatBelanjaController::class, 'update']);
    Route::get('/hapusTempatBelanja/{id}', [TempatBelanjaController::class, 'destroy']);
});

// Katalog Produk //
Route::middleware(['check'])->group(function () {
    Route::get('/daftarProduk', [KatalogProdukController::class, 'index']);
    Route::get('/formTambahProduk', [KatalogProdukController::class, 'create']);
    Route::post('/inputProduk', [KatalogProdukController::class, 'store']);
    Route::get('/formEditProduk/{nomorProduk}', [KatalogProdukController::class, 'edit']);
    Route::post('/editProduk/{nomorProduk}', [KatalogProdukController::class, 'update']);
    Route::get('/hapusProduk/{nomorProduk}', [KatalogProdukController::class, 'destroy']);
});

// Harga Produk
Route::middleware(['check'])->group(function () {
    Route::get('/daftarHargaModal', [HargaProdukController::class, 'indexHargaModal']);
    Route::post('/inputHargaModal', [HargaProdukController::class, 'storeHargaModal']);
    Route::post('/hapusHargaModal/{index}', [HargaProdukController::class, 'destroyHargaModal']);
    Route::get('/daftarHargaJual', [HargaProdukController::class, 'indexHargaJual']);
    Route::post('/inputHargaJual', [HargaProdukController::class, 'storeHargaJual']);
    Route::post('/hapusHargaJual/{index}', [HargaProdukController::class, 'destroyHargaJual']);
});

// Satuan Produk //
Route::middleware(['check'])->group(function () {
    Route::get('/daftarSatuanProduk', [SatuanProdukController::class, 'index']);
    Route::post('/inputSatuanProduk', [SatuanProdukController::class, 'store']);
    Route::get('/hapusSatuanProduk/{id}', [SatuanProdukController::class, 'destroy']);
});

// Keuangan
Route::middleware(['check'])->group(function () {
    Route::get('/daftarKeuanganHarian', [KeuanganController::class, 'indexHarian']);
    Route::post('/inputKeuanganHarian', [KeuanganController::class, 'store']);
    Route::get('/hapusKeuanganHarian/{id}', [KeuanganController::class, 'destroy']);
    Route::get('/daftarKeuanganBulanan', [KeuanganController::class, 'indexBulanan']);
});