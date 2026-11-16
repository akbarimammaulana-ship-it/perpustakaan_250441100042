<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    protected $model = Buku::class;

    public function definition(): array
    {
        $dataBuku = fake()->randomElement([
            [
                'judul' => 'Rekayasa Perangkat Lunak Terstruktur dan Berorientasi Objek',
                'penulis' => 'Rosa A.S. dan M. Shalahuddin',
                'tahun_terbit' => 2021,
            ],
            [
                'judul' => 'Basis Data: Pendekatan Praktis untuk Sistem Informasi',
                'penulis' => 'Fathansyah',
                'tahun_terbit' => 2018,
            ],
            [
                'judul' => 'Analisis dan Perancangan Sistem Informasi',
                'penulis' => 'Abdul Kadir',
                'tahun_terbit' => 2019,
            ],
            [
                'judul' => 'Pengantar Sistem Informasi',
                'penulis' => 'Edhy Sutanta',
                'tahun_terbit' => 2019,
            ],
            [
                'judul' => 'Algoritma dan Pemrograman dalam Bahasa Pascal, C, dan C++',
                'penulis' => 'Rinaldi Munir',
                'tahun_terbit' => 2020,
            ],
        ]);

        return [
            'kategori_id' => fake()->randomElement(
                Kategori::pluck('id')->toArray()
            ),
            'judul' => $dataBuku['judul'],
            'penulis' => $dataBuku['penulis'],
            'tahun_terbit' => $dataBuku['tahun_terbit'],
        ];
    }
}