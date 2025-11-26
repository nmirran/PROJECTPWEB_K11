<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - BrownyGift</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #fff0f5, #ffe4e1);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #ff69b4, #ff1493);
            min-height: 100vh;
            padding: 0;
            box-shadow: 5px 0 20px rgba(255, 105, 180, 0.3);
        }
        .sidebar .nav-link {
            color: white;
            padding: 18px 25px;
            border-radius: 0;
            font-size: 1.05rem;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 5px solid white;
            padding-left: 30px;
        }

        .sidebar .nav-link i {
            width: 30px;
        }

        .content-area {
            padding: 40px;
        }

        .card-menu {
            background: white;
            border: none;
            border-radius: 20px;
            padding: 35px 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.15);
            transition: all 0.4s;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #333;
        }
        .card-menu:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(255, 105, 180, 0.3);
            background: #fff5f9;
        }
        .card-menu i {
            font-size: 3.5rem;
            color: #ff69b4;
            margin-bottom: 15px;
        }
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar p-0">
                <div class="p-4 text-center text-white">
                    <h3 class="fw-bold mb-0">BrownyGift</h3>
                    <small>Admin Panel</small>
                    <hr style="border-color: rgba(255,255,255,0.4);">
                    <p class="mb-0">Halo, <strong>{{ auth()->user()->username }}</strong></p>
                    <span class="badge bg-light text-dark mt-1">Administrator</span>
                </div>

                <div class="nav flex-column">
                    <a href="/admin" class="nav-link active"> Dashboard</a>
                    <a href="#" class="nav-link"> Profil Admin</a>
                    <a href="#" class="nav-link"> Kelola Produk</a>
                    <a href="#" class="nav-link"> Kelola Pesanan</a>
                    <a href="#" class="nav-link"> Laporan Penjualan</a>
                    <hr style="border-color: rgba(255,255,255,0.3); margin: 20px;">
                    <a href="{{ url('/logout') }}" class="nav-link text-white-50" onclick="return confirm('Yakin logout?')">
                        Logout
                    </a>
                </div>
            </div>

            <div class="col-md-9 content-area">
                <h2 class="mb-2"> Dashboard Admin</h2>
                <p class="text-muted">Selamat datang kembali, Admin {{ auth()->user()->username }}!</p>

                <div class="row mb-5">
                    <div class="col-md-3">
                        <div class="stats-card text-center">
                            <h4 class="text-pink">247</h4>
                            <p>Total Pesanan</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card text-center">
                            <h4 class="text-pink">89</h4>
                            <p>Produk Tersedia</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card text-center">
                            <h4 class="text-pink">Rp 8.4jt</h4>
                            <p>Pendapatan Bulan Ini</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card text-center">
                            <h4 class="text-pink">12</h4>
                            <p>Pesanan Hari Ini</p>
                        </div>
                    </div>
                </div>

                <h4 class="mb-4">Menu Admin</h4>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <a href="#" class="card-menu">
                            <div>
                                <h5>Kelola Produk</h5>
                                <p class="text-muted mb-0">Tambah, edit, dan hapus produk buket</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="#" class="card-menu">
                            <div>
                                <h5>Kelola Pesanan</h5>
                                <p class="text-muted mb-0">Lihat dan proses semua pesanan pelanggan</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="#" class="card-menu">
                            <div>
                                <h5>Laporan Penjualan</h5>
                                <p class="text-muted mb-0">Grafik dan detail pendapatan</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 mb-4">
                        <a href="#" class="card-menu">
                            <div>
                                <h5>Profil Admin</h5>
                                <p class="text-muted mb-0">Ubah data dan password admin</p>
                            </div>
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
