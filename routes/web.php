<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/', [PatientController::class, 'index'])->name('search.index');
Route::post('/search', [PatientController::class, 'sequentialSearch'])->name('search.sequential');

// Menampilkan form upload
Route::get('/upload', [PatientController::class, 'showForm'])->name('upload');

// Memproses file Excel yang diunggah
Route::post('/upload', [PatientController::class, 'import'])->name('upload.process');

// Menampilkan halaman pencarian rekursif
Route::get('/recursive', [PatientController::class, 'showRecursiveSearch'])->name('search.recursive');

// Proses pencarian rekursif
Route::post('/recursive', [PatientController::class, 'sequentialSearchRecursive'])->name('search.recursive.process');

