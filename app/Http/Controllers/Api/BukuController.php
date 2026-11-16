<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')
            ->withCount('peminjamans')
            ->orderBy('id')
            ->paginate(10);

        return BukuResource::collection($buku);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'judul' => 'required|string|min:3|max:150',
            'penulis' => 'required|string|min:3|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $buku = Buku::create($validated);

        $buku->load('kategori')->loadCount('peminjamans');

        return (new BukuResource($buku))
            ->response()
            ->setStatusCode(201);
    }

    public function show(string $id)
    {
        $buku = Buku::with('kategori')
            ->withCount('peminjamans')
            ->findOrFail($id);

        return new BukuResource($buku);
    }

    public function update(Request $request, string $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate([
            'kategori_id' => 'sometimes|required|integer|exists:kategoris,id',
            'judul' => 'sometimes|required|string|min:3|max:150',
            'penulis' => 'sometimes|required|string|min:3|max:100',
            'tahun_terbit' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
        ]);

        $buku->update($validated);

        $buku->load('kategori')->loadCount('peminjamans');

        return new BukuResource($buku);
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return response()->json([
            'message' => 'Buku berhasil dihapus',
        ]);
    }
}
