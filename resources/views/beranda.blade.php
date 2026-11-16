<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Perpustakaan Digital</title>
    
    <!-- Fonts & Tailwind CSS CDN -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col justify-between">

    <!-- Header Navigation -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex items-center justify-between border-b border-slate-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <span class="text-lg font-bold tracking-tight text-white">E-Perpustakaan</span>
        </div>

        <nav class="flex items-center gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-slate-200 hover:text-white bg-slate-800 hover:bg-slate-700 rounded-xl border border-slate-700 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-slate-300 hover:text-white transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-xl shadow-lg shadow-indigo-600/30 transition">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="w-full max-w-7xl mx-auto px-6 py-16 flex-1 flex items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Side: Hero Text -->
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold uppercase tracking-wider">
                    <span>Akses Literatur Digital Kapan Saja</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                    Jelajahi Ribuan Buku & Referensi Akademik
                </h1>
                <p class="text-slate-400 text-base leading-relaxed">
                    Sistem Manajemen Perpustakaan Digital terpadu. Cari koleksi buku, lakukan peminjaman mandiri, dan pantau riwayat pengembalian dengan cepat dan transparan.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-medium rounded-xl shadow-lg shadow-indigo-600/30 transition">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-medium rounded-xl shadow-lg shadow-indigo-600/30 transition">
                            Mulai Pinjam Buku
                        </a>
                        <a href="{{ route('register') }}" class="px-6 py-3 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-medium rounded-xl transition">
                            Daftar Anggota Baru
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Right Side: Feature Highlight Card -->
            <div class="bg-slate-800/60 border border-slate-700/60 rounded-3xl p-8 backdrop-blur-xl shadow-2xl space-y-6">
                <h3 class="text-xl font-semibold text-white">Fasilitas Layanan Utama</h3>
                
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-900/50 border border-slate-700/40">
                        <div class="p-2.5 rounded-xl bg-indigo-500/10 text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-white text-sm">Katalog & Pencarian Cepat</h4>
                            <p class="text-xs text-slate-400 mt-1">Cari judul buku, pengarang, atau kategori secara instan.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-2xl bg-slate-900/50 border border-slate-700/40">
                        <div class="p-2.5 rounded-xl bg-emerald-500/10 text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-white text-sm">Peminjaman & Transaksi Otomatis</h4>
                            <p class="text-xs text-slate-400 mt-1">Sistem pencatatan peminjaman dan rekap otomatis.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full max-w-7xl mx-auto px-6 py-6 border-t border-slate-800 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Sistem Informasi Perpustakaan. All rights reserved.
    </footer>

</body>
</html>