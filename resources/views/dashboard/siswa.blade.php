<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-6 bg-gradient-to-r from-violet-900/60 to-slate-800 border border-violet-500/30 rounded-2xl shadow-xl flex justify-between items-center">
                <div>
                    <span class="px-3 py-1 bg-violet-500/20 text-violet-300 text-xs font-semibold rounded-full border border-violet-500/30">Anggota Perpustakaan</span>
                    <h2 class="text-2xl font-bold text-white mt-2">Selamat Datang, {{ auth()->user()->name }} 📖</h2>
                    <p class="text-slate-300 text-sm">Temukan buku favoritmu dan ajukan peminjaman secara online.</p>
                </div>
                <div class="hidden sm:block">
                    <span class="p-4 bg-violet-600/20 rounded-2xl text-violet-400 text-3xl font-extrabold">SISWA</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Buku Sedang Dipinjam</p>
                    <h3 class="text-3xl font-bold text-violet-400 mt-1">{{ $sedangDipinjam ?? 0 }}</h3>
                    <p class="text-xs text-slate-400 mt-2">
                        {{ ($sedangDipinjam ?? 0) > 0 ? 'Cek tenggat di Riwayat Peminjaman' : 'Belum ada pinjaman aktif' }}
                    </p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Total Selesai Dipinjam</p>
                    <h3 class="text-3xl font-bold text-emerald-400 mt-1">{{ $selesaiDipinjam ?? 0 }}</h3>
                    <p class="text-xs text-slate-400 mt-2">Buku Telah Dikembalikan</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Status Sanksi / Denda</p>
                    <h3 class="text-xl font-bold text-emerald-400 mt-1">Bebas Denda ✅</h3>
                    <p class="text-xs text-slate-400 mt-2">Tidak ada denda aktif</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-violet-500/50 transition">
                    <div class="w-12 h-12 bg-violet-600/20 text-violet-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">🔍</div>
                    <h3 class="text-lg font-bold text-white">Cari Katalog & Pinjam Buku</h3>
                    <p class="text-slate-400 text-sm mt-1">Jelajahi koleksi buku perpustakaan dan ajukan booking peminjaman langsung.</p>
                    <a href="{{ route('katalog.index') }}" class="inline-block mt-4 px-4 py-2 bg-violet-600 hover:bg-violet-500 text-white font-medium text-sm rounded-lg transition">Jelajahi Katalog &rarr;</a>
                </div>

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-indigo-500/50 transition">
                    <div class="w-12 h-12 bg-indigo-600/20 text-indigo-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">📜</div>
                    <h3 class="text-lg font-bold text-white">Riwayat Peminjaman Saya</h3>
                    <p class="text-slate-400 text-sm mt-1">Lihat status permohonan pinjam, tenggat pengembalian, dan riwayat peminjaman.</p>
                    <a href="{{ route('riwayat.saya') }}" class="inline-block mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm rounded-lg transition">Lihat Riwayat &rarr;</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>