<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/laporan', [DashboardController::class, 'laporan'])->name('laporan');
Route::get('/cetak-laporan', [DashboardController::class, 'generateReport'])->name('cetak-laporan');
Route::get('/pajak-bulanan', [LaporanController::class, 'showPajakB'])->name('laporan.bulanan');
Route::get('/pajak-tahunan', [laporanController::class, 'showPajakT'])->name('laporan.tahunan');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::resource('laporan', LaporanController::class);
   
});

require __DIR__.'/auth.php';
