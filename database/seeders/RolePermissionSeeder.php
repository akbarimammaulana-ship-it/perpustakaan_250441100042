<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'akses dashboard admin',
            'akses dashboard petugas',
            'akses dashboard siswa',
            'lihat daftar buku',
            'kelola data buku',
            'kelola data pengguna',
            'kelola role pengguna',
            'kelola peminjaman',
            'kelola pengembalian',
            'mengajukan peminjaman buku',
            'memproses persetujuan peminjaman',
            'mencatat pengembalian buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat laporan perpustakaan',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $roleAdmin   = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $rolePetugas = Role::firstOrCreate(['name' => 'petugas', 'guard_name' => 'web']);
        $roleSiswa   = Role::firstOrCreate(['name' => 'siswa', 'guard_name' => 'web']);

        $roleAdmin->syncPermissions($permissions);

        $rolePetugas->syncPermissions([
            'akses dashboard petugas',
            'lihat daftar buku',
            'kelola data buku',
            'kelola peminjaman',
            'kelola pengembalian',
            'memproses persetujuan peminjaman',
            'mencatat pengembalian buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat laporan perpustakaan',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ]);

        $roleSiswa->syncPermissions([
            'akses dashboard siswa',
            'lihat daftar buku',
            'mengajukan peminjaman buku',
            'melihat status peminjaman sendiri',
            'melihat riwayat peminjaman sendiri',
            'lihat profil sendiri',
            'ubah profil sendiri',
        ]);

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator Perpustakaan',
                'password' => Hash::make('passwordadmin123'),
            ]
        );
        $admin->syncRoles([$roleAdmin]);

        $petugas = User::firstOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name' => 'Petugas Perpustakaan',
                'password' => Hash::make('passwordpetugas123'),
            ]
        );
        $petugas->syncRoles([$rolePetugas]);

        $siswa = User::firstOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name' => 'Siswa Perpustakaan',
                'password' => Hash::make('passwordsiwa123'),
            ]
        );
        $siswa->syncRoles([$roleSiswa]);
    }
}