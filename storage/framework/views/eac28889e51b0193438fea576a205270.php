<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Toko - BrownyGift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffeef8, #ffd1e8);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .title {
            color: #880e4f;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .card-profile {
            background: white;
            border-radius: 25px;
            padding: 50px;
            max-width: 650px;
            margin: auto;
            box-shadow: 0 15px 45px rgba(216, 27, 96, 0.25);
            animation: fadeIn .4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .store-name {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .store-desc {
            font-size: 1rem;
            color: #666;
            margin-top: 8px;
        }

        .label-title {
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 8px;
        }

        .btn-back {
            background: #880e4f;
            color: white;
            border-radius: 12px;
            padding: 10px 18px;
            text-decoration: none;
        }

        .btn-back:hover {
            opacity: .85;
        }

        .status-pill {
            padding: 7px 20px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.95rem;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="text-center title">Profil Toko</h2>

    <div class="text-end mb-4">
        <a href="/owner" class="btn-back">← Kembali</a>
    </div>

    <div class="card-profile">

        <!-- Nama Toko -->
        <div class="store-name"><?php echo e($toko->nama_toko); ?></div>

        <!-- Deskripsi -->
        <div class="store-desc"><?php echo e($toko->deskripsi); ?></div>

        <!-- Status -->
        <div class="label-title">Status Toko:</div>

        <?php if($toko->status == 'buka'): ?>
            <span class="status-pill bg-success text-white">Buka</span>
        <?php else: ?>
            <span class="status-pill bg-danger text-white">Tutup</span>
        <?php endif; ?>

    </div>

    <div class="text-end mb-4">
        <a href="/owner/profil_toko_edit" class="btn-back" style="background:#d81b60;">
            Edit Profil
        </a>
    </div>

</div>

</body>
</html>
<?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/profil_toko.blade.php ENDPATH**/ ?>