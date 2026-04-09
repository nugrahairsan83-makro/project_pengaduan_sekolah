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
    // database/seeders/DatabaseSeeder.php
        public function run(): void
    {
        // Akun Admin (Pengurus)
        Admin::updateOrCreate(
            ['username' => 'ketua_rt'],
            ['password' => Hash::make('admin123')]
        );

        // Akun User (Warga)
        User::updateOrCreate(
            ['email' => 'warga@example.com'],   
            [
                'username' => 'warga01',
                'name' => 'Bapak Budi',
                'no_rumah' => 'A12',
                'password' => Hash::make('warga123')
            ]
        );

        // Kategori
        $kategori = ['Keamanan', 'Kebersihan', 'Jalan & Lampu'];
        foreach ($kategori as $k) {
            Kategori::updateOrCreate(['ket_kategori' => $k]);
        }
    }
}
