<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white">Riwayat Peminjaman Saya</h2>
                    <p class="text-slate-400 text-sm">Daftar buku yang sedang Anda pinjam maupun yang sudah dikembalikan.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('katalog.index') }}" class="px-4 py-2 bg-violet-600 hover:bg-violet-500 text-white text-sm font-medium rounded-lg transition">
                        + Pinjam Buku
                    </a>
                    <a href="{{ route('dashboard.siswa') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-sm font-medium rounded-lg transition">
                        &larr; Dashboard
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @php
                // Menyesuaikan otomatis apakah controller mengirim variabel $riwayat atau $peminjaman
                $daftarRiwayat = $riwayat ?? $peminjaman ?? collect();
            @endphp

            <div class="bg-slate-800 border border-slate-700 rounded-2xl overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-700/50 text-slate-300 text-xs uppercase">
                            <th class="p-4">No</th>
                            <th class="p-4">Judul Buku</th>
                            <th class="p-4">Pengarang</th>
                            <th class="p-4">Tgl Pinjam</th>
                            <th class="p-4">Batas Kembali</th>
                            <th class="p-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 text-sm">
                        @forelse ($daftarRiwayat as $index => $item)
                            <tr class="hover:bg-slate-700/30">
                                <td class="p-4">{{ $index + 1 }}</td>
                                <td class="p-4 font-medium text-white">{{ $item->buku->judul ?? '-' }}</td>
                                <td class="p-4 text-slate-300">{{ $item->buku->pengarang ?? '-' }}</td>
                                <td class="p-4">{{ $item->tgl_pinjam ?? $item->tanggal_pinjam ?? '-' }}</td>
                                <td class="p-4">{{ $item->tgl_kembali ?? $item->tanggal_kembali ?? '-' }}</td>
                                <td class="p-4">
                                    @php
                                        $status = $item->status ?? 'dipinjam';
                                    @endphp
                                    @if ($status === 'dikembalikan')
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-500/20 text-emerald-300">
                                            Dikembalikan
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-500/20 text-amber-300">
                                            {{ ucfirst($status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-6 text-center text-slate-400">
                                    Anda belum memiliki riwayat peminjaman buku.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>