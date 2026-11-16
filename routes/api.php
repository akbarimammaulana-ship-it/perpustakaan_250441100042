<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BukuController;
use App\Http\Controllers\Api\RekapController;

Route::apiResource('buku', BukuController::class);

Route::get(
    '/rekap/buku-per-kategori',
    [RekapController::class, 'bukuPerKategori']
);

Route::get(
    '/rekap/peminjaman-per-buku',
    [RekapController::class, 'peminjamanPerBuku']
);

Route::middleware(['auth:sanctum', 'permission:manage books'])
    ->group(function () {
        Route::get('/buku', [BukuController::class, 'index']);
        Route::post('/buku', [BukuController::class, 'store']);
        Route::put('/buku/{buku}', [BukuController::class, 'update']);
        Route::delete('/buku/{buku}', [BukuController::class, 'destroy']);
    });