<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh; padding: 20px 0;">
    <div class="card p-4 shadow-sm" style="width: 500px; border-radius: 15px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Daftar Warga Baru</h3>
            <p class="text-muted">Lengkapi data untuk mulai melapor</p>
        </div>

        <form action="<?php echo e(route('register')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Ahmad Subarjo" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="ahmad99" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">No. Rumah</label>
                    <input type="text" name="no_rumah" class="form-control" placeholder="A-10" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-semibold">Alamat Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mt-2">Daftar Sekarang</button>
            
            <div class="text-center mt-3">
                <p class="mb-0">Sudah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-decoration-none">Login di sini</a></p>
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\pengaduan-sekolah\resources\views/auth/register.blade.php ENDPATH**/ ?>