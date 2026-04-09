<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ditambahkan untuk proses registrasi
use Illuminate\Support\Facades\Hash; // Ditambahkan untuk enkripsi password

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    // Menampilkan halaman form daftar
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses data pendaftaran
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'no_rumah' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'no_rumah' => $request->no_rumah,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 1. Cek Login untuk ADMIN (Ketua RT/RW)
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin/dashboard');
        }

        // 2. Cek Login untuk WARGA (Tabel Users)
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$loginType => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/warga/dashboard');
        }

        return back()->with('error', 'Kredensial tidak ditemukan atau password salah.');
    }

    public function logout()
    {
        // Menyesuaikan pengecekan guard sesuai konfigurasi auth.php
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else {
            Auth::logout(); // Logout untuk guard web (Warga)
        }

        return redirect('/login');
    }
}
