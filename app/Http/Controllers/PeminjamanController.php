<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'anggota', 'buku'])->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        if ($buku->stok < 1) {
            return back()->with('error', 'Maaf, stok buku sedang habis.');
        }

        Peminjaman::create([
            'user_id'     => auth()->id(),
            'buku_id'     => $buku->id,
            'tgl_pinjam'  => Carbon::now()->format('Y-m-d'),
            'tgl_kembali' => Carbon::now()->addDays(7)->format('Y-m-d'),
            'status'      => 'dipinjam',
        ]);

        $buku->decrement('stok');

        return redirect()->route('riwayat.saya')->with('success', 'Peminjaman berhasil diajukan.');
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'dikembalikan',
        ]);

        if ($peminjaman->buku) {
            $peminjaman->buku->increment('stok');
        }

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dicatat sebagai dikembalikan.');
    }

    public function riwayatSaya()
    {
        $riwayat = Peminjaman::where('user_id', auth()->id())->with('buku')->get();
        return view('siswa.riwayat', compact('riwayat'));
    }

    public function laporan()
    {
        $peminjaman = Peminjaman::with(['user', 'anggota', 'buku'])->latest()->get();
        return view('laporan.index', compact('peminjaman'));
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }
}