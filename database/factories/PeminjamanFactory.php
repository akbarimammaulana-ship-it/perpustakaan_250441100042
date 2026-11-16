<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeminjamanFactory extends Factory
{
    protected $model = Peminjaman::class;

    public function definition(): array
    {
        $tanggalPinjam = fake()->dateTimeBetween(
            '-1 year',
            '-1 month'
        );

        return [
            'anggota_id' => fake()->randomElement(
                Anggota::pluck('id')->toArray()
            ),

            'buku_id' => fake()->randomElement(
                Buku::pluck('id')->toArray()
            ),

            'tanggal_pinjam' => $tanggalPinjam,

            'tanggal_kembali' => fake()->optional(
                0.7
            )->dateTimeBetween(
                $tanggalPinjam,
                'now'
            ),
        ];
    }
}