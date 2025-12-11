<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BrownyGift</title>

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

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h4 {
            color: #212529;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: #6c757d;
            margin-bottom: 0;
        }

        /* Alert Section */
        .alert-notification {
            background: #fff9e6;
            border-left: 4px solid #ffc107;
            border-radius: 0.5rem;
            padding: 1rem 1.25rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .alert-notification i {
            color: #ffc107;
            font-size: 1.25rem;
            margin-right: 0.75rem;
        }

        .alert-notification .alert-content {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .alert-notification .alert-text {
            color: #856404;
            font-weight: 500;
            margin: 0;
        }

        .btn-alert {
            background-color: #ffc107;
            color: #000;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.3s;
        }

        .btn-alert:hover {
            background-color: #e0a800;
            color: #000;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .stat-card .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 0.75rem;
        }

        .stat-card h6 {
            color: #6c757d;
            font-size: 0.875rem;
            font-weight: 500;
            margin: 0;
        }

        .stat-card .stat-value {
            color: #212529;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .stat-icon.pink {
            background-color: #ffe4e8;
            color: #dc3545;
        }

        .stat-icon.blue {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .stat-icon.yellow {
            background-color: #fff9e6;
            color: #ffc107;
        }

        .stat-icon.green {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        /* Menu Cards */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .menu-card {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            text-decoration: none;
            color: inherit;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .menu-card .menu-icon {
            width: 64px;
            height: 64px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .menu-card .menu-icon.pink {
            background-color: #ffe4e8;
            color: #dc3545;
        }

        .menu-card .menu-icon.blue {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .menu-card .menu-icon.green {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .menu-card h5 {
            color: #212529;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .menu-card p {
            color: #6c757d;
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .badge-primary {
            background-color: #dc3545;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Activity Section */
        .activity-section {
            background: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .activity-section h5 {
            color: #dc3545;
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .activity-item {
            display: flex;
            align-items: start;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s;
        }

        .activity-item:hover {
            background-color: #f8f9fa;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .activity-icon.success {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .activity-icon.info {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .activity-icon.warning {
            background-color: #fff9e6;
            color: #ffc107;
        }

        .activity-content {
            flex: 1;
        }

        .activity-content p {
            margin: 0 0 0.25rem 0;
            color: #212529;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .activity-content small {
            color: #6c757d;
            font-size: 0.813rem;
        }

        @media (max-width: 992px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .menu-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .menu-grid {
                grid-template-columns: 1fr;
            }
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
            <a href="/admin" class="nav-link active">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="/admin/produk" class="nav-link">
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
            <a href="/admin/profile" class="nav-link">
                <i class="bi bi-person"></i>
                Profil
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="<?php echo e(url('/logout')); ?>" class="text-danger text-decoration-none" onclick="return confirm('Yakin logout?')">
                <i class="bi bi-box-arrow-left me-2"></i> Keluar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h4>Dashboard Admin</h4>
            <p>Kelola pesanan dan produk toko</p>
        </div>

        <!-- Alert Notification -->
        <div class="alert-notification">
            <div class="alert-content">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span class="alert-text">3 pesanan menunggu konfirmasi pembayaran</span>
            </div>
            <button class="btn-alert">Lihat Pesanan</button>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <h6>Total Pesanan</h6>
                    <div class="stat-icon pink">
                        <i class="bi bi-bag"></i>
                    </div>
                </div>
                <h3 class="stat-value">47</h3>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h6>Sedang Diproses</h6>
                    <div class="stat-icon blue">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                </div>
                <h3 class="stat-value">12</h3>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h6>Dalam Pengiriman</h6>
                    <div class="stat-icon yellow">
                        <i class="bi bi-truck"></i>
                    </div>
                </div>
                <h3 class="stat-value">8</h3>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h6>Selesai</h6>
                    <div class="stat-icon green">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
                <h3 class="stat-value">25</h3>
            </div>
        </div>

        <!-- Menu Grid -->
        <div class="menu-grid">
            <a href="/admin/produk" class="menu-card">
                <div class="menu-icon pink">
                    <i class="bi bi-box-seam"></i>
                </div>
                <h5>Kelola Produk</h5>
                <p>Tambah, edit, atau hapus produk</p>
            </a>

            <a href="#" class="menu-card">
                <div class="menu-icon blue">
                    <i class="bi bi-receipt"></i>
                </div>
                <h5>Pesanan</h5>
                <p>Kelola dan proses pesanan</p>
                <span class="badge-primary">3 menunggu</span>
            </a>

            <a href="#" class="menu-card">
                <div class="menu-icon green">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h5>Laporan</h5>
                <p>Lihat laporan penjualan</p>
            </a>
        </div>

        <!-- Activity Section -->
        <div class="activity-section">
            <h5>Aktivitas Terbaru</h5>

            <div class="activity-item">
                <div class="activity-icon success">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="activity-content">
                    <p>Pesanan #B-2024-012 telah selesai</p>
                    <small>3 menit yang lalu</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon info">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="activity-content">
                    <p>Produk "Buket Anniversary" stok ditambah</p>
                    <small>1 jam yang lalu</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon warning">
                    <i class="bi bi-exclamation-circle"></i>
                </div>
                <div class="activity-content">
                    <p>Pesanan baru menunggu konfirmasi pembayaran</p>
                    <small>2 jam yang lalu</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\PROJECTPWEB_K11\resources\views/dashboard/admin/index.blade.php ENDPATH**/ ?>