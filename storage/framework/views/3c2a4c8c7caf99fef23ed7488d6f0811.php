<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard - BrownyGift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffeef8, #ffd1e8);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #d81b60, #880e4f);
            min-height: 100vh;
            padding: 0;
            box-shadow: 8px 0 30px rgba(216, 27, 96, 0.4);
        }

        .sidebar .nav-link {
            color: white;
            padding: 20px 30px;
            font-size: 1.1rem;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #fff;
            padding-left: 35px;
        }

        .sidebar .nav-link i {
            width: 35px;
        }

        .content {
            padding: 50px;
        }

        .owner-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(216, 27, 96, 0.2);
            transition: 0.4s;
        }

        .owner-card:hover {
            transform: translateY(-15px);
        }

        .owner-card i {
            font-size: 4.5rem;
            color: #d81b60;
            margin-bottom: 20px;
        }

        .stats-box {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .stats-box h3 {
            color: #d81b60;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Owner -->
            <div class="col-md-3 sidebar p-0">
                <div class="p-5 text-center text-white">
                    <h2 class="fw-bold mb-0">BrownyGift</h2>
                    <h5>Owner Panel</h5>
                    <hr style="border-color: rgba(255,255,255,0.5);">
                    <p class="mb-0"><strong>{{ auth()->user()->username }}</strong></p>
                    <span class="badge bg-warning text-dark fs-6">OWNER</span>
                </div>

                <div class="nav flex-column">
                    <a href="/owner" class="nav-link active"> Dashboard</a>
                    <a href="/owner/profil_toko" class="nav-link"> Profil Toko</a>
                    <a href="/owner/karyawan" class="nav-link"> Tambah Karyawan</a>
                    <a href="/owner/karyawan_list" class="nav-link"> Daftar Karyawan</a>
                    <a href="#" class="nav-link"> Laporan Penjualan</a>
                    <a href="#" class="nav-link"> Profil Saya</a>
                    <hr style="border-color: rgba(255,255,255,0.4); margin: 30px;">
                    <a href="<?php echo e(url('/logout')); ?>" class="nav-link text-white-50" onclick="return confirm('Keluar dari Owner Panel?')">
                        Logout
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 content">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold text-dark">Selamat Datang, Owner!</h1>
                    <p class="lead text-muted">Kontrol penuh BrownyGift ada di tangan Anda</p>
                </div>

                <!-- Stats -->
                <div class="row mb-5 g-4">
                    <div class="col-md-3">
                        <div class="stats-box">
                            <h3>1.248</h3>
                            <p class="text-muted">Total Pesanan</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <h3>Rp 42,8jt</h3>
                            <p class="text-muted">Pendapatan Bulan Ini</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <h3>127</h3>
                            <p class="text-muted">Produk Aktif</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-box">
                            <h3>8</h3>
                            <p class="text-muted">Karyawan Aktif</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Utama Owner -->
                <h3 class="mb-4 text-dark">Menu Owner</h3>
                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="/owner/profil_toko" class="owner-card d-block text-decoration-none">
                            <h4>Profil Toko</h4>
                            <p class="text-muted">Atur informasi toko</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/owner/karyawan" class="owner-card d-block text-decoration-none">
                            <h4>Tambah Karyawan</h4>
                            <p class="text-muted">Atur akun karyawan</p>
                        </a>
                    </div>
                    <div>
                        <a href="/owner/karyawan_list" class="owner-card d-block text-decoration-none">
                            <h4>Daftar Karyawan</h4>
                            <p class="text-muted">Lihat akun karyawan</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="owner-card d-block text-decoration-none">
                            <h4>Laporan Penjualan</h4>
                            <p class="text-muted">Lihat Laporan Penjualan</p>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="owner-card d-block text-decoration-none">
                            <h4>Profil Saya</h4>
                            <p class="text-muted">Atur detail akun</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH D:\COOLYEAHH!!\SMT 3\PROJECTPWEB_K11\resources\views/dashboard/owner/index.blade.php ENDPATH**/ ?>
