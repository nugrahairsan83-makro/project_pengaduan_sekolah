@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 mb-4">
                <h5 class="card-title">Sampaikan Aspirasi</h5>
                <hr>
                <form action="{{ route('siswa.store') }}" method="POST"> @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori Masalah</label>
                        <select name="id_kategori" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}">{{ $kat->ket_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Spesifik</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Depan Gapura RT 02"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Aspirasi/Keluhan</label>
                        <textarea name="ket" class="form-control" rows="3" placeholder="Jelaskan detail masalah..."
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Kirim Aspirasi</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card p-3">
                <h5 class="card-title">Riwayat Aspirasi Anda</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggapan RT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($histori as $h)
                                <tr>
                                    <td>{{ $h->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $h->kategori->ket_kategori }}</td>
                                    <td>
                                        @php
                                            $status = $h->aspirasi->status ?? 'Menunggu';
                                            $badge = $status == 'Selesai' ? 'success' : ($status == 'Proses' ? 'warning' : 'secondary');
                                        @endphp
                                        <span class="badge bg-{{ $badge }}">{{ $status }}</span>
                                    </td>
                                    <td>{{ $h->aspirasi->feedback ?? 'Belum ada tanggapan' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada aspirasi yang dikirim.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection