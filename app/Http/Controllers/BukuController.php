<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->latest()->get();
        $kategoris = Kategori::all();

        return view('buku.index', [
            'buku'      => $bukus,
            'bukus'     => $bukus,
            'kategoris' => $kategoris,
        ]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'penerbit'     => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'stok'         => 'required|integer|min:0',
            'kategori_id'  => 'nullable|exists:kategori,id',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show($id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);

        return view('buku.detail', [
            'buku' => $buku,
        ]);
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();

        return view('buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'penerbit'     => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer',
            'stok'         => 'required|integer|min:0',
            'kategori_id'  => 'nullable|exists:kategori,id',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }

    public function katalog()
    {
        $buku = Buku::with('kategori')->where('stok', '>', 0)->get();

        return view('siswa.katalog', compact('buku'));
    }

    public function cari(Request $request)
    {
        $judul = $request->query('judul');
        $hasil = DB::select("SELECT * FROM buku WHERE judul = '$judul'");

        return response()->json($hasil);
    }
}