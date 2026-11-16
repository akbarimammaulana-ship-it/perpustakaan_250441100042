<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RiwayatPeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with(['buku', 'anggota'])
            ->where(function ($query) {
                $query->whereHas('anggota', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                ->orWhere('user_id', auth()->id());
            })
            ->latest() 
            ->get();

        return view('peminjaman.riwayat', compact('peminjamans'));
    }
}