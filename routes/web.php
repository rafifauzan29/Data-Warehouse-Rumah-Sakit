<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\WaktuController;

// Ganti route '/' agar tidak tumpang tindih dengan 'index' halaman utama
Route::get('/', function () {
    return redirect()->route('kunjungan.index');
});

// Gunakan nama route agar mudah dipanggil di blade
Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan.index');

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
Route::get('/ruang', [RuangController::class, 'index'])->name('ruang.index');
Route::get('/waktu', [WaktuController::class, 'index'])->name('waktu.index');
