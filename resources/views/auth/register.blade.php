<x-guest-layout>
    @slot('title', 'Registrasi - Sistem Perpustakaan')

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white">Buat Akun Baru</h2>
        <p class="text-sm text-slate-400 mt-1">Lengkapi formulir untuk mendaftar sebagai anggota</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-slate-300 mb-1.5">Nama Lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="Nama Anda">
            @error('name')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-slate-300 mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="nama@email.com">
            @error('email')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="no_telepon" class="block text-sm font-medium text-slate-300 mb-1.5">No. Telepon</label>
            <input id="no_telepon" type="text" name="no_telepon" value="{{ old('no_telepon') }}" required
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="Contoh: 081234567890">
            @error('no_telepon')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5">Kata Sandi</label>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="Minimal 8 karakter">
            @error('password')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-1.5">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="Ulangi kata sandi">
            @error('password_confirmation')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white font-medium rounded-xl shadow-lg shadow-indigo-600/30 hover:shadow-indigo-500/40 transition duration-200 mt-2">
            Daftar Sekarang
        </button>
    </form>

    <div class="mt-6 pt-6 border-t border-slate-700/60 text-center">
        <p class="text-sm text-slate-400">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">Masuk</a>
        </p>
    </div>
</x-guest-layout>