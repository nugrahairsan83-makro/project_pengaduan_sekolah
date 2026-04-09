<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aspirasi Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7f6;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-4" style="width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Lapor Pak RT</h3>
            <p class="text-muted">Silakan masuk untuk menyampaikan aspirasi</p>
        </div>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Username atau Email</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username atau Email"
                    required autofocus>
                <div class="form-text">Gunakan akun yang sudah didaftarkan oleh Pengurus.</div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Masuk Sekarang</button>

            <div class="text-center mt-3">
                <p class="mb-0 text-muted">Belum punya akun?
                    <a href="<?php echo e(route('register')); ?>" class="text-decoration-none fw-bold">Daftar sebagai Warga</a>
                </p>
                <small class="text-muted">Masalah login? Hubungi Sekretariat RT</small>
            </div>
                <small class="text-muted">Masalah login? Hubungi Sekretariat RT</small>
    </div>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\pengaduan-sekolah\resources\views/login.blade.php ENDPATH**/ ?>