<x-app-layout>
    <div class="py-8 bg-slate-900 min-h-screen text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-slate-800 border border-slate-700 rounded-2xl flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-white">Kelola User & Petugas</h2>
                    <p class="text-xs text-slate-400">Daftar semua pengguna yang terdaftar di sistem.</p>
                </div>
                <a href="{{ route('dashboard.admin') }}" class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white rounded-lg text-sm">&larr; Kembali</a>
            </div>

            <div class="bg-slate-800 border border-slate-700 rounded-2xl p-6 overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-700/50 uppercase text-xs text-slate-400">
                        <tr>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b border-slate-700/50 hover:bg-slate-700/20">
                            <td class="p-3 font-semibold text-white">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs rounded bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">
                                    {{ $user->role ?? 'siswa' }}
                                </span>
                            </td>
                            <td class="p-3">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-rose-400 hover:text-rose-300 text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>