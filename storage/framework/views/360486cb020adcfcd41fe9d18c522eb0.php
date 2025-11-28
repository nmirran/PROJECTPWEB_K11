<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan - BrownyGift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffeef8, #ffd1e8);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(216, 27, 96, 0.25);
            transition: .3s;
        }

        .btn-pink {
            background: linear-gradient(90deg, #d81b60, #880e4f);
            color: white;
            border-radius: 12px;
            padding: 12px 25px;
            font-weight: bold;
            border: none;
        }

        .btn-pink:hover {
            opacity: .9;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="text-center mb-4" style="color:#880e4f;font-weight:bold;">
        Edit Akun Karyawan
    </h2>

    <div class="col-md-6 mx-auto">
        <a href="/owner/karyawan_list" class="btn btn-secondary mb-3">← Kembali</a>

        <div class="card-custom">

            <form action="/owner/karyawan_edit/<?php echo e($karyawan->id_user); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control"
                           value="<?php echo e($karyawan->nama); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Karyawan</label>
                    <input type="email" name="email" class="form-control"
                           value="<?php echo e($karyawan->email); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="text" name="no_hp" class="form-control"
                           value="<?php echo e($karyawan->no_hp); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Kosongkan jika tidak diganti">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn-pink">Simpan Perubahan</button>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>
<?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/karyawan_edit.blade.php ENDPATH**/ ?>