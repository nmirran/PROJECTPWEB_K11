<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan - BrownyGift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffeef8, #ffd1e8);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .card-table {
            background: white;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 15px 40px rgba(216, 27, 96, 0.25);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .title {
            color: #880e4f;
            font-weight: bold;
        }

        table.table {
            border-radius: 15px;
            overflow: hidden;
            background: white;
        }

        th {
            background: #d81b60;
            color: white;
        }

        .btn-back {
            background: #880e4f;
            color: white;
            border-radius: 10px;
            padding: 10px 18px;
            text-decoration: none;
        }

        .btn-back:hover {
            opacity: .85;
        }

        .btn-delete {
            background: #ff3b3b;
            color: white;
            border-radius: 7px;
            padding: 5px 10px;
        }

        .btn-delete:hover {
            opacity: .85;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="text-center title mb-4">Daftar Akun Karyawan</h2>

    <div class="text-end mb-4">
        <a href="/owner" class="btn-back">← Kembali</a>
    </div>

    <div class="card-table">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($k->id_user); ?></td>
                        <td><?php echo e($k->nama); ?></td>
                        <td><?php echo e($k->email); ?></td>
                        <td><?php echo e($k->no_hp); ?></td>
                        <td>
                            <a href="/owner/karyawan_edit/<?php echo e($k->id_user); ?>"
                            class="btn btn-warning btn-sm text-white"
                            style="border-radius:7px;">
                                Edit
                            </a>

                            <a href="/owner/karyawan_delete/<?php echo e($k->id_user); ?>"
                            class="btn btn-danger btn-sm"
                            style="border-radius:7px;"
                            onclick="return confirm('Yakin ingin menghapus karyawan ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-muted">Belum ada karyawan terdaftar</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
<?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/karyawan_list.blade.php ENDPATH**/ ?>