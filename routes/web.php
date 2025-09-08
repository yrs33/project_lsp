

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipSuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/arsip', [ArsipSuratController::class, 'index'])->name('arsip.index');
Route::get('/arsip/tambah', [ArsipSuratController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipSuratController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}', [ArsipSuratController::class, 'show'])->name('arsip.show');
Route::delete('/arsip/{id}', [ArsipSuratController::class, 'destroy'])->name('arsip.destroy');
Route::view('/about', 'about')->name('about');
use App\Http\Controllers\KategoriSuratController;
Route::resource('kategori', KategoriSuratController::class)->except(['show']);
