<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white">Laporan & Rekap Peminjaman</h2>
                    <p class="text-slate-400 text-sm">Rekapitulasi transaksi peminjaman dan pengembalian buku perpustakaan.</p>
                </div>
                <div class="flex gap-3">
                    <button onclick="window.print()" class="px-4 py-2 bg-amber-600 hover:bg-amber-500 text-white text-sm font-medium rounded-lg transition">
                        Cetak Laporan
                    </button>
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-lg transition">
                        &larr; Kembali
                    </a>
                </div>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-700/50 text-slate-300 text-xs uppercase">
                            <th class="p-4">No</th>
                            <th class="p-4">Nama Peminjam</th>
                            <th class="p-4">Judul Buku</th>
                            <th class="p-4">Tgl Pinjam</th>
                            <th class="p-4">Tgl Kembali</th>
                            <th class="p-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 text-sm">
                        @forelse ($peminjaman as $index => $item)
                            <tr class="hover:bg-slate-700/30">
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4 font-medium text-white">{{ $item->user->name ?? $item->anggota->nama ?? '-' }}</td>
                                <td class="p-4">{{ $item->buku->judul ?? '-' }}</td>
                                <td class="p-4">{{ $item->tgl_pinjam ?? $item->tanggal_pinjam ?? '-' }}</td>
                                <td class="p-4">{{ $item->tgl_kembali ?? $item->tanggal_kembali ?? '-' }}</td>
                                <td class="p-4">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-500/20 text-amber-300">
                                        {{ ucfirst($item->status ?? 'dipinjam') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-400">Belum ada data transaksi peminjaman.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>