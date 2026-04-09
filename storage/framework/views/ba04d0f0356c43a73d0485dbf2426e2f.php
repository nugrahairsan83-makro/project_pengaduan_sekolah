<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Aspirasi Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Lapor Pak RT</a>
            <div class="ms-auto">
                
                <?php if(auth()->guard('admin')->check()): ?>
                    <span class="navbar-text text-white">
                        Halo, Pengurus (<?php echo e(Auth::guard('admin')->user()->username); ?>)
                    </span>
                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-sm btn-danger ms-3">Logout</a>

                    
                <?php else: ?>
                    <?php if(auth()->guard()->check()): ?>
                        <span class="navbar-text text-white">
                            Halo, <?php echo e(Auth::user()->name); ?> (No. Rumah: <?php echo e(Auth::user()->no_rumah); ?>)
                        </span>
                        <a href="<?php echo e(route('logout')); ?>" class="btn btn-sm btn-danger ms-3">Logout</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\pengaduan-sekolah\resources\views/layout.blade.php ENDPATH**/ ?>