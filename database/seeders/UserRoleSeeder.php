<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'petugas']);
        Role::firstOrCreate(['name' => 'siswa']);

        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Administrator Perpustakaan',
                'password' => Hash::make('Adm!nPerpus#Yoiki'),
            ]
        );
        $admin->email_verified_at = now();
        $admin->save();
        $admin->syncRoles(['admin']);

        $petugas = User::updateOrCreate(
            ['email' => 'petugas@gmail.com'],
            [
                'name'     => 'Petugas Perpustakaan',
                'password' => Hash::make('passwordpetugas123'),
            ]
        );
        $petugas->email_verified_at = now();
        $petugas->save();
        $petugas->syncRoles(['petugas']);

        $siswa = User::updateOrCreate(
            ['email' => 'siswa@gmail.com'],
            [
                'name'     => 'Siswa Perpustakaan',
                'password' => Hash::make('passwordsiswa123'),
            ]
        );
        $siswa->email_verified_at = now();
        $siswa->save();
        $siswa->syncRoles(['siswa']);
    }
}