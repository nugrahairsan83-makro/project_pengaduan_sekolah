<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin
        Admin::updateOrCreate(
            ['username' => 'admin'],
            ['password' => Hash::make('admin123')]
        );

        // 2. Buat Akun Siswa
        Siswa::updateOrCreate(
            ['nis' => 12345],
            ['kelas' => 'XII RPL', 'password' => Hash::make('siswa123')]
        );

        // 3. Buat Kategori
        Kategori::updateOrCreate(['ket_kategori' => 'Sarana Kelas']);
        Kategori::updateOrCreate(['ket_kategori' => 'Kebersihan']);
        Kategori::updateOrCreate(['ket_kategori' => 'Kantin']);
    }
}
