<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AktivitasController;

Route::get('/', fn() => redirect()->route('biodata.index'));
Route::resource('biodata', BiodataController::class)->parameters(['biodata' => 'biodata']);
Route::get('biodata/{biodata}/cv', [BiodataController::class, 'cv'])->name('biodata.cv');
Route::post('biodata/{biodata}/riwayat', [RiwayatController::class, 'store'])->name('riwayat.store');
Route::delete('riwayat/{riwayat}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');
Route::get('riwayat/{riwayat}/edit', [RiwayatController::class, 'edit'])->name('riwayat.edit');
Route::put('riwayat/{riwayat}', [RiwayatController::class, 'update'])->name('riwayat.update');
Route::get('aktivitas', [AktivitasController::class, 'index'])->name('aktivitas.index');
Route::delete('aktivitas/clear', [AktivitasController::class, 'clear'])->name('aktivitas.clear');
Route::delete('aktivitas/{aktivitas}', [AktivitasController::class, 'destroy'])->name('aktivitas.destroy');
