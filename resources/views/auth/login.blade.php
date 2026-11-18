<x-guest-layout>
    @slot('title', 'Login - Sistem Perpustakaan')

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-white">Selamat Datang Kembali - 250441100042</h2>
        <p class="text-sm text-slate-400 mt-1">Masukkan akun Anda untuk melanjutkan</p>
    </div>

    <!-- Session Status Alerts -->
    @if (session('status'))
        <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-300 mb-1.5">Alamat Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="nama@email.com">
            @error('email')
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-medium text-slate-300">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-indigo-400 hover:text-indigo-300 transition">Lupa kata sandi?</a>
                @endif
            </div>
            <input id="password" type="password" name="password" required
                class="w-full px-4 py-2.5 rounded-xl bg-slate-900/60 border border-slate-700 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                placeholder="••••••••">
            @error('password' )
                <span class="text-xs text-rose-400 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-slate-900 border-slate-700 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-slate-800">
                <span class="ml-2 text-sm text-slate-400">Ingat Saya</span>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white font-medium rounded-xl shadow-lg shadow-indigo-600/30 hover:shadow-indigo-500/40 transition duration-200 mt-2">
            Masuk Sekarang
        </button>
    </form>

    <!-- Register Link -->
    <div class="mt-6 pt-6 border-t border-slate-700/60 text-center">
        <p class="text-sm text-slate-400">
            Belum memiliki akun? 
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">Daftar Anggota</a>
        </p>
    </div>
</x-guest-layout>