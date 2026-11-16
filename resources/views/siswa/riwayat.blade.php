<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-white">Riwayat Peminjaman Saya</h2>
                    <p class="text-xs text-slate-400">Daftar transaksi peminjaman buku Anda.</p>
                </div>
                <a href="{{ route('dashboard.siswa') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg text-sm">&larr; Dashboard</a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-700/50 uppercase text-xs text-slate-400">
                        <tr>
                            <th class="p-3">Buku</th>
                            <th class="p-3">Tgl Pinjam</th>
                            <th class="p-3">Tgl Kembali</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat as $item)
                        <tr class="border-b border-slate-700/50 hover:bg-slate-700/20">
                            <td class="p-3 font-semibold text-white">{{ $item->buku->judul ?? '-' }}</td>
                            <td class="p-3">{{ $item->tgl_pinjam }}</td>
                            <td class="p-3">{{ $item->tgl_kembali }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                    {{ $item->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="p-4 text-center text-slate-500">Belum ada riwayat peminjaman.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>