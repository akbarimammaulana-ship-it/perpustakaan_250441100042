<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatPeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('beranda');

Route::get('/laravel-welcome', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();

        if (method_exists($user, 'hasRole')) {
            if ($user->hasRole('admin')) {
                return redirect()->route('dashboard.admin');
            }
            if ($user->hasRole('petugas')) {
                return redirect()->route('dashboard.petugas');
            }
            if ($user->hasRole('siswa')) {
                return redirect()->route('dashboard.siswa');
            }
        }

        if (isset($user->role)) {
            if ($user->role === 'admin') {
                return redirect()->route('dashboard.admin');
            }
            if ($user->role === 'petugas') {
                return redirect()->route('dashboard.petugas');
            }
            if ($user->role === 'siswa') {
                return redirect()->route('dashboard.siswa');
            }
        }

        abort(403, 'Akun Anda belum dikonfigurasikan dengan Role (Admin/Petugas/Siswa). Silakan hubungi Administrator.');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/buku-cari', [BukuController::class, 'cari'])->name('buku.cari');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

    Route::middleware(['can:kelola-buku'])->group(function () {
        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('buku.update');
        Route::patch('/buku/{buku}', [BukuController::class, 'update']);
        Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy');
    });

    Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('buku.show');

    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('dashboard.admin');
        })->name('dashboard.admin');

        Route::resource('users', UserController::class);
    });

    Route::middleware(['role:admin|petugas'])->group(function () {
        Route::get('/petugas/dashboard', function () {
            return view('dashboard.petugas');
        })->name('dashboard.petugas');

        Route::resource('peminjaman', PeminjamanController::class)->except(['store', 'show']);
        Route::get('/laporan', [PeminjamanController::class, 'laporan'])->name('laporan.index');
    });

    Route::middleware(['role:siswa'])->group(function () {
        Route::get('/siswa/dashboard', function () {
            $userId = auth()->id();
            $kolomUser = \Illuminate\Support\Facades\Schema::hasColumn('peminjamans', 'user_id')
                ? 'user_id'
                : 'anggota_id';

            $query = \App\Models\Peminjaman::where($kolomUser, $userId);

            if (\Illuminate\Support\Facades\Schema::hasColumn('peminjamans', 'status')) {
                $sedangDipinjam  = (clone $query)->where('status', 'dipinjam')->count();
                $selesaiDipinjam = (clone $query)->where('status', 'dikembalikan')->count();
            } else {
                $sedangDipinjam  = $query->count();
                $selesaiDipinjam = 0;
            }

            return view('dashboard.siswa', compact('sedangDipinjam', 'selesaiDipinjam'));
        })->name('dashboard.siswa');

        Route::get('/anggota/dashboard', function () {
            return redirect()->route('dashboard.siswa');
        })->name('dashboard.anggota');

        Route::get('/katalog', [BukuController::class, 'katalog'])->name('katalog.index');
        Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
        Route::get('/riwayat-saya', [RiwayatPeminjamanController::class, 'index'])->name('riwayat.saya');
    });
});

require __DIR__.'/auth.php';