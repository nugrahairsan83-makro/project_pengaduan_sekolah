<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;
use App\Models\Kategori;

class WargaController extends Controller
{
    public function index()
    {
        // Ambil ID user (Warga) yang sedang login
        $user_id = Auth::id();

        // Ambil histori aspirasi warga tersebut berdasarkan user_id
        $histori = InputAspirasi::where('user_id', $user_id)
            ->with('aspirasi', 'kategori')
            ->latest()
            ->get();

        $kategori = Kategori::all();
        return view('warga.dashboard', compact('histori', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required',
            'ket' => 'required',
            'id_kategori' => 'required'
        ]);

        // 1. Simpan ke Input Aspirasi menggunakan user_id
        $input = InputAspirasi::create([
            'user_id' => Auth::id(),
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket
        ]);

        // 2. Otomatis buat status 'Menunggu' di tabel Aspirasi
        Aspirasi::create([
            'id_pelaporan' => $input->id_pelaporan,
            'status' => 'Menunggu'
        ]);

        return back()->with('success', 'Aspirasi berhasil dikirim!');
    }
}
