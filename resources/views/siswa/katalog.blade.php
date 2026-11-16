<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-white">Katalog Buku Tersedia</h2>
                    <p class="text-xs text-slate-400">Pilih buku yang ingin Anda pinjam.</p>
                </div>
                <a href="{{ route('dashboard.siswa') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg text-sm">&larr; Dashboard</a>
            </div>

            @if (session('success'))
                <div class="p-4 bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 bg-rose-500/20 border border-rose-500/40 text-rose-300 rounded-xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($buku as $item)
                    <div class="p-5 bg-slate-800 border border-slate-700 rounded-xl space-y-3">
                        <h3 class="text-lg font-bold text-white">{{ $item->judul }}</h3>
                        <p class="text-xs text-slate-400">Pengarang: <span class="text-slate-200">{{ $item->pengarang ?? $item->penulis ?? '-' }}</span></p>
                        <div class="flex justify-between items-center pt-2">
                            <span class="text-xs text-emerald-400 font-semibold">Stok: {{ $item->stok ?? 0 }}</span>
                            <form action="{{ route('peminjaman.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $item->id }}">
                                <button type="submit" class="px-3 py-1.5 bg-violet-600 hover:bg-violet-500 text-white text-xs font-semibold rounded-lg transition">Pinjam Buku</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-slate-500 col-span-3">Tidak ada buku tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>