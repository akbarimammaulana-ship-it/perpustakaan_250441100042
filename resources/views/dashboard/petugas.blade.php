<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl shadow-xl flex justify-between items-center">
                <div>
                    <span class="px-3 py-1 bg-cyan-500/10 text-cyan-400 text-xs font-semibold rounded-full border border-cyan-500/20">Petugas Operasional</span>
                    <h2 class="text-2xl font-bold text-white mt-2">Halo, {{ auth()->user()->name }} 📋</h2>
                    <p class="text-slate-400 text-sm">Kelola sirkulasi peminjaman, pengembalian buku, dan denda anggota harian.</p>
                </div>
                <div class="hidden sm:block">
                    <span class="p-4 bg-cyan-600/20 rounded-2xl text-cyan-400 text-3xl font-extrabold">PETUGAS</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Permintaan Pinjam</p>
                    <h3 class="text-3xl font-bold text-amber-400 mt-1">8</h3>
                    <p class="text-xs text-slate-400 mt-2">Menunggu Verifikasi</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Pengembalian Hari Ini</p>
                    <h3 class="text-3xl font-bold text-cyan-400 mt-1">15</h3>
                    <p class="text-xs text-slate-400 mt-2">Buku Diterima</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Keterlambatan / Denda</p>
                    <h3 class="text-3xl font-bold text-rose-400 mt-1">3</h3>
                    <p class="text-xs text-slate-400 mt-2">Perlu Pengurusan Denda</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-cyan-500/50 transition">
                    <div class="w-12 h-12 bg-cyan-600/20 text-cyan-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">🔄</div>
                    <h3 class="text-lg font-bold text-white">Peminjaman & Pengembalian</h3>
                    <p class="text-slate-400 text-sm mt-1">Proses persetujuan peminjaman siswa dan catat tanggal pengembalian buku.</p>
                    <a href="{{ route('peminjaman.index') }}" class="inline-block mt-4 px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white font-medium text-sm rounded-lg transition">Buka Transaksi &rarr;</a>
                </div>

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-emerald-500/50 transition">
                    <div class="w-12 h-12 bg-emerald-600/20 text-emerald-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">📖</div>
                    <h3 class="text-lg font-bold text-white">Kelola Katalog & Stok Buku</h3>
                    <p class="text-slate-400 text-sm mt-1">Perbarui jumlah stok buku fisik dan tambahkan koleksi buku baru.</p>
                    <a href="{{ route('buku.index') }}" class="inline-block mt-4 px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-medium text-sm rounded-lg transition">Kelola Buku &rarr;</a>
                </div>

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-amber-500/50 transition">
                    <div class="w-12 h-12 bg-amber-600/20 text-amber-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">📊</div>
                    <h3 class="text-lg font-bold text-white">Laporan & Rekap Sistem</h3>
                    <p class="text-slate-400 text-sm mt-1">Cetak rekapitulasi transaksi peminjaman, pengembalian, dan statistik denda.</p>
                    <a href="{{ route('laporan.index') }}" class="inline-block mt-4 px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white font-medium text-sm rounded-lg transition">Lihat Laporan &rarr;</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>