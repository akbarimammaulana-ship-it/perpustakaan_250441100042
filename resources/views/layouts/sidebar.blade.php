<ul class="nav">
    <li><a href="/dashboard">Dashboard</a></li>

    @if(in_array(auth()->user()->role, ['admin', 'petugas']))
        <li><a href="/buku">Kelola Data Buku</a></li>
        <li><a href="/peminjaman">Transaksi Peminjaman</a></li>
    @endif

    @if(auth()->user()->role === 'admin')
        <li><a href="/users">Kelola User / Petugas</a></li>
        <li><a href="/laporan">Laporan Sistem</a></li>
    @endif

    @if(auth()->user()->role === 'siswa')
        <li><a href="/katalog">Katalog Buku</a></li>
        <li><a href="/riwayat-saya">Peminjaman Saya</a></li>
    @endif
</ul>