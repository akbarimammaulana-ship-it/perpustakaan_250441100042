<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl shadow-xl flex justify-between items-center">
                <div>
                    <span class="px-3 py-1 bg-indigo-500/10 text-indigo-400 text-xs font-semibold rounded-full border border-indigo-500/20">Administrator Panel</span>
                    <h2 class="text-2xl font-bold text-white mt-2">Selamat Datang, {{ auth()->user()->name }} 👋</h2>
                    <p class="text-slate-400 text-sm">Anda memiliki akses penuh ke seluruh manajemen dan kontrol sistem perpustakaan.</p>
                </div>
                <div class="hidden sm:block">
                    <span class="p-4 bg-indigo-600/20 rounded-2xl text-indigo-400 text-3xl font-extrabold">ADMIN</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Total Pengguna</p>
                    <h3 class="text-3xl font-bold text-white mt-1">128</h3>
                    <p class="text-xs text-indigo-400 mt-2">Admin, Petugas & Siswa</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Katalog Buku</p>
                    <h3 class="text-3xl font-bold text-emerald-400 mt-1">1,450</h3>
                    <p class="text-xs text-slate-400 mt-2">Total Judul Buku</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Peminjaman Aktif</p>
                    <h3 class="text-3xl font-bold text-amber-400 mt-1">42</h3>
                    <p class="text-xs text-slate-400 mt-2">Sedang Dipinjam</p>
                </div>
                <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl">
                    <p class="text-xs text-slate-400 font-medium uppercase">Total Denda Terkumpul</p>
                    <h3 class="text-3xl font-bold text-rose-400 mt-1">Rp 150.000</h3>
                    <p class="text-xs text-slate-400 mt-2">Bulan Ini</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-indigo-500/50 transition">
                    <div class="w-12 h-12 bg-indigo-600/20 text-indigo-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">👥</div>
                    <h3 class="text-lg font-bold text-white">Kelola User & Petugas</h3>
                    <p class="text-slate-400 text-sm mt-1">Tambah, edit, hapus akun petugas, admin, serta atur role & hak akses.</p>
                    <a href="{{ route('users.index') }}" class="inline-block mt-4 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm rounded-lg transition">Kelola Pengguna &rarr;</a>
                </div>

                <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl hover:border-emerald-500/50 transition">
                    <div class="w-12 h-12 bg-emerald-600/20 text-emerald-400 rounded-xl flex items-center justify-center font-bold text-xl mb-4">📚</div>
                    <h3 class="text-lg font-bold text-white">Master Buku & Kategori</h3>
                    <p class="text-slate-400 text-sm mt-1">Manajemen data katalog buku, stok, subjek, dan kategori perpustakaan.</p>
                    <a href="{{ route('buku.index') }}" class="inline-block mt-4 px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white font-medium text-sm rounded-lg transition">Kelola Katalog &rarr;</a>
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