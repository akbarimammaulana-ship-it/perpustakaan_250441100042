@extends('layouts.app')

@section('title', 'Home - Perpustakaan Digital')

@section('content')
<div class="container">
    <section class="hero-card">
        <h2>Selamat Datang di Perpustakaan Digital</h2>

        <p>
            Temukan berbagai koleksi buku untuk menambah wawasan
            dan pengetahuan. Jelajahi koleksi buku yang tersedia
            dan temukan bacaan yang sesuai dengan kebutuhanmu.
        </p>

        <a href="{{ route('buku.index') }}" class="primary-link">
            Lihat Daftar Buku
        </a>
    </section>
</div>
@endsection
