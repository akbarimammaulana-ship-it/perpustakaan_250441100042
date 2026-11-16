<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;

class RekapController extends Controller
{
    public function bukuPerKategori()
    {
        $data = Kategori::withCount('bukus')->get();

        return response()->json([
            'message' => 'Rekap jumlah buku per kategori.',
            'data' => $data,
        ], 200);
    }

    public function peminjamanPerBuku()
    {
        $data = Buku::select('id', 'judul')
            ->withCount('peminjamans')
            ->orderByDesc('peminjamans_count')
            ->get();

        return response()->json([
            'message' => 'Rekap jumlah peminjaman per buku.',
            'data' => $data,
        ], 200);
    }
}
