<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatPeminjamanController;

Route::middleware(['auth', 'permission:view own borrowing history'])
    ->get('/riwayat-peminjaman', [RiwayatPeminjamanController::class, 'index'])
    ->name('peminjaman.riwayat');

// Halaman Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');
});

// Dashboard Petugas
Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/dashboard/petugas', function () {
        return view('dashboard.petugas');
    })->name('dashboard.petugas');
});

// Dashboard Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');
});

// Dashboard utama Laravel Breeze
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard.admin');
        }

        if ($user->hasRole('petugas')) {
            return redirect()->route('dashboard.petugas');
        }

        if ($user->hasRole('siswa')) {
            return redirect()->route('dashboard.siswa');
        }

        abort(403, 'Role tidak ditemukan.');
    })->name('dashboard');
});

// Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Route Buku (Dapat diakses semua pengguna)
Route::get('/buku', [BukuController::class, 'index'])
    ->name('buku.index');

Route::get('/buku/{id}', [BukuController::class, 'show'])
    ->name('buku.show');


// PENGELOLAAN BUKU
Route::middleware([
    'auth',
    'permission:manage books'
])->group(function () {

    Route::get('/kelola-buku', function () {
        return view('buku.kelola');
    })->name('buku.kelola');

});


// PENGELOLAAN PENGGUNA
Route::middleware([
    'auth',
    'permission:manage users'
])->group(function () {

    Route::get('/kelola-pengguna', function () {
        return view('admin.pengguna');
    })->name('pengguna.index');

});


// LAPORAN
Route::middleware([
    'auth',
    'permission:view library reports'
])->group(function () {

    Route::get('/laporan', function () {
        return view('laporan.index');
    })->name('laporan.index');

});

require __DIR__.'/auth.php';