
<?php $__env->startSection('content'); ?>
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Data Aspirasi Warga</h4>
        </div>
        <form action="<?php echo e(route('admin.dashboard')); ?>" method="GET" class="row g-3 mb-4 bg-light p-2 rounded">
            <div class="col-auto">
                <input type="date" name="tanggal" class="form-control" value="<?php echo e(request('tanggal')); ?>">
            </div>
            <div class="col-auto">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    <?php $__currentLoopData = $kategori_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($k->id_kategori); ?>" <?php echo e(request('kategori') == $k->id_kategori ?
                        'selected' : ''); ?>>
                                    <?php echo e($k->ket_kategori); ?>

                                </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Tgl</th>
                        <th>NIS / Siswa</th>
                        <th>Kategori</th>
                        <th>Laporan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($row->created_at->format('d-m-Y')); ?></td>
                                    <td><?php echo e($row->nis); ?> <br> <small><?php echo e($row->siswa->kelas); ?></small></td>
                                    <td><?php echo e($row->kategori->ket_kategori); ?></td>
                                    <td>
                                        <b><?php echo e($row->lokasi); ?></b> <br> <?php echo e($row->ket); ?>

                                    </td>
                                    <td>
                                        <?php
                                            $status = $row->aspirasi->status;
                                            $color = $status == 'Selesai' ? 'success' : ($status == 'Proses' ?
                                                'warning' : 'secondary');
                                        ?>
                                        <span class="badge bg-<?php echo e($color); ?>"><?php echo e($status); ?></span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info text-white" data-bstoggle="modal"
                                            data-bs-target="#modalEdit<?php echo e($row->id_pelaporan); ?>">
                                            Update
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalEdit<?php echo e($row->id_pelaporan); ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update Status Laporan</h5>
                                                <button type="button" class="btn-close" data-bsdismiss="modal"></button>
                                            </div>
                                            <form action="<?php echo e(route('admin.update', $row->id_pelaporan)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Status Penyelesaian</label>
                                                        <select name="status" class="form-select">
                                                            <option value="Menunggu" <?php echo e($row->aspirasi->status ==
                        'Menunggu' ? 'selected' : ''); ?>>Menunggu</option>
                                                            <option value="Proses" <?php echo e($row->aspirasi->status ==
                        'Proses' ? 'selected' : ''); ?>>Proses</option>
                                                            <option value="Selesai" <?php echo e($row->aspirasi->status ==
                        'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                                                        </select>
                                                    </div>8 | P a g e
                                                    <div class="mb-3">
                                                        <label>Umpan Balik / Keterangan Perbaikan</label>
                                                        <textarea name="feedback" class="form-control" rows="3"
                                                            placeholder="Contoh: Sudah diperbaiki oleh teknisi"><?php echo e($row->aspirasi->feedback); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bsdismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data laporan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\pengaduan-sekolah\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>