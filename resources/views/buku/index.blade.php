<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-white">Katalog & Master Data Buku</h2>
                    <p class="text-xs text-slate-400">Manajemen koleksi buku perpustakaan.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg text-sm">&larr; Dashboard</a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-700/50 uppercase text-xs text-slate-400">
                        <tr>
                            <th class="p-3">Judul Buku</th>
                            <th class="p-3">Pengarang</th>
                            <th class="p-3">Stok</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($buku as $item)
                        <tr class="border-b border-slate-700/50 hover:bg-slate-700/20">
                            <td class="p-3 font-semibold text-white">{{ $item->judul }}</td>
                            <td class="p-3">{{ $item->pengarang }}</td>
                            <td class="p-3"><span class="px-2 py-1 bg-emerald-500/20 text-emerald-400 text-xs rounded">{{ $item->stok }} pcs</span></td>
                            <td class="p-3">
                                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="p-4 text-center text-slate-500">Belum ada data buku.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>