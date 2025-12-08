<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - BrownyGift</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-header h5 {
            color: #dc3545;
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .sidebar-header small {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-link {
            color: #495057;
            padding: 0.75rem 1.5rem;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .nav-link:hover {
            background-color: #f8f9fa;
            color: #dc3545;
        }

        .nav-link.active {
            background-color: #fff5f5;
            color: #dc3545;
            border-left-color: #dc3545;
            font-weight: 500;
        }

        .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            border-top: 1px solid #f0f0f0;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
        }

        .content-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 2rem;
            max-width: 800px;
        }

        .btn-back {
            color: #6c757d;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .btn-back:hover {
            color: #dc3545;
        }

        .btn-back i {
            margin-right: 0.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.625rem 0.875rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }

        .btn-submit {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.625rem 2rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background-color: #c82333;
            color: white;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 0.625rem 2rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            color: white;
        }

        .image-preview {
            width: 150px;
            height: 150px;
            border: 2px dashed #dee2e6;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-preview-placeholder {
            color: #adb5bd;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h5>BrownyGift</h5>
            <small>Admin</small>
        </div>

        <nav class="sidebar-nav">
            <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-person"></i>
                Profil
            </a>
            <a href="<?php echo e(route('produk.index')); ?>" class="nav-link active">
                <i class="bi bi-box-seam"></i>
                Produk
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-receipt"></i>
                Pesanan
            </a>
            <a href="#" class="nav-link">
                <i class="bi bi-file-earmark-text"></i>
                Laporan
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="<?php echo e(route('logout')); ?>" class="text-danger text-decoration-none">
                <i class="bi bi-box-arrow-left me-2"></i> Keluar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-card">
            <!-- Back Button -->
            <a href="<?php echo e(route('produk.index')); ?>" class="btn-back">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Daftar Produk
            </a>

            <!-- Form Title -->
            <h4 class="mb-4">Tambah Produk Baru</h4>

            <!-- Form -->
            <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="nama_produk"
                           value="<?php echo e(old('nama_produk')); ?>"
                           placeholder="Contoh: Buket Mawar Pink Premium"
                           required>
                    <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                    <input type="file"
                           class="form-control <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           name="gambar_produk"
                           accept="image/*"
                           id="imageInput"
                           required>
                    <?php $__errorArgs = ['gambar_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- Image Preview -->
                    <div class="image-preview" id="imagePreview">
                        <div class="image-preview-placeholder">
                            <i class="bi bi-image" style="font-size: 2rem;"></i>
                            <p class="mb-0 small">Preview gambar</p>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="id_kategori"
                            required>
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($k->id_kategori); ?>" <?php echo e(old('id_kategori') == $k->id_kategori ? 'selected' : ''); ?>>
                                <?php echo e($k->nama_kategori); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['id_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Produk <span class="text-danger">*</span></label>
                    <textarea class="form-control <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              name="deskripsi_produk"
                              rows="4"
                              placeholder="Jelaskan detail produk..."
                              required><?php echo e(old('deskripsi_produk')); ?></textarea>
                    <?php $__errorArgs = ['deskripsi_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                        <input type="number"
                               class="form-control <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="harga_produk"
                               value="<?php echo e(old('harga_produk')); ?>"
                               placeholder="250000"
                               min="0"
                               required>
                        <?php $__errorArgs = ['harga_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stok <span class="text-danger">*</span></label>
                        <input type="number"
                               class="form-control <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="stok_produk"
                               value="<?php echo e(old('stok_produk')); ?>"
                               placeholder="15"
                               min="0"
                               required>
                        <?php $__errorArgs = ['stok_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-circle me-2"></i>Simpan Produk
                    </button>
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn-cancel">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Image Preview
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
<?php /**PATH D:\COLLEGE LIFE\SEMESTER 3\PEMROGRAMAN WEBSITE\PROJECT\PROJECTPWEB_K11\resources\views/admin/produk/create.blade.php ENDPATH**/ ?>