<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>

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

        .profile-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 1.5rem;
        }

        .profile-header {
            margin-bottom: 2rem;
        }

        .profile-header h4 {
            color: #212529;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .profile-header p {
            color: #6c757d;
            margin-bottom: 0;
        }

        .profile-section-title {
            color: #dc3545;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .profile-section-title i {
            margin-right: 0.5rem;
        }

        .profile-avatar {
            text-align: center;
            margin-bottom: 1rem;
        }

        .avatar-container {
            position: relative;
            display: inline-block;
        }

        .avatar-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f0f0f0;
        }

        .admin-info {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .admin-info h5 {
            color: #212529;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .admin-info p {
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .role-badge {
            display: inline-block;
            background-color: #fff0f2;
            color: #dc3545;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
        }

        .form-control:disabled {
            background-color: #f8f9fa;
        }

        .btn-update {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.625rem 2rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.875rem;
        }

        .btn-update:hover {
            background-color: #c82333;
            color: white;
        }

        .divider {
            border: 0;
            border-top: 1px solid #f0f0f0;
            margin: 2rem 0;
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
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="{{ route('profile.index') }}" class="nav-link active">
                <i class="bi bi-person"></i>
                Profil
            </a>
            <a href="{{ route('produk.index') }}" class="nav-link">
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
            <a href="{{ route('logout') }}" class="text-danger text-decoration-none">
                <i class="bi bi-box-arrow-left me-2"></i> Keluar
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Profile Header -->
        <div class="profile-card">
            <div class="profile-header">
                <h4>Profil Saya</h4>
                <p>Kelola informasi profil Anda</p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Profile Photo Section -->
            <div class="profile-avatar">
                <div class="avatar-container">
                    <img src="{{ asset('images/admin-avatar.jpg') }}"
                         alt="Admin Photo"
                         class="avatar-img"
                         onerror="this.src='https://ui-avatars.com/api/?name=Admin+BrownyGift&size=120&background=dc3545&color=fff'">
                </div>
                <div class="admin-info">
                    <h5>Admin BrownyGift</h5>
                    <p class="mb-2">admin@brownygift.com</p>
                    <span class="role-badge">Admin</span>
                </div>
            </div>
        </div>

        <!-- Information Profile Section -->
        <div class="profile-card">
            <div class="profile-section-title">
                <i class="bi bi-person-circle"></i>
                Informasi Profil
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text"
                               class="form-control @error('nama_lengkap') is-invalid @enderror"
                               name="nama_lengkap"
                               value="{{ old('nama_lengkap', $user->nama ?? 'Admin BrownyGift') }}"
                               required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email', $user->email ?? 'admin@brownygift.com') }}"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">No. Handphone</label>
                        <input type="text"
                               class="form-control @error('no_handphone') is-invalid @enderror"
                               name="no_handphone"
                               value="{{ old('no_handphone', $user->no_hp ?? '082345678910') }}"
                               required>
                        @error('no_handphone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn-update">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="profile-card">
            <div class="profile-section-title">
                <i class="bi bi-lock"></i>
                Ganti Password
            </div>

            <form action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password"
                           class="form-control @error('password_lama') is-invalid @enderror"
                           name="password_lama"
                           required>
                    @error('password_lama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password"
                           class="form-control @error('password_baru') is-invalid @enderror"
                           name="password_baru"
                           required>
                    @error('password_baru')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password"
                           class="form-control @error('password_baru_confirmation') is-invalid @enderror"
                           name="password_baru_confirmation"
                           required>
                    @error('password_baru_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn-update">
                        Ganti Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Photo Preview
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('photoPreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
