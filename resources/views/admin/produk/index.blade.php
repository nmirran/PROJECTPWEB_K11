<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - BrownyGift</title>

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
        }

        .header-section {
            margin-bottom: 2rem;
        }

        .header-section h4 {
            color: #212529;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .header-section p {
            color: #6c757d;
            margin-bottom: 0;
        }

        .btn-add {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-add:hover {
            background-color: #c82333;
            color: white;
        }

        .product-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 0.375rem;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table th {
            color: #495057;
            font-weight: 600;
            font-size: 0.875rem;
            border-bottom: 2px solid #dee2e6;
            padding: 1rem 0.75rem;
        }

        .table td {
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }

        .badge-category {
            background-color: #fff0f2;
            color: #dc3545;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.813rem;
        }

        .badge-available {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.813rem;
        }

        .badge-unavailable {
            background-color: #f8d7da;
            color: #842029;
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.813rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-edit, .btn-delete {
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.875rem;
        }

        .btn-edit {
            background-color: #0d6efd;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0b5ed7;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            color: white;
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            max-width: 200px;
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
            <a href="{{ route('dashboard')}}" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </a>
            <a href="{{route('profile.index')}}" class="nav-link">
                <i class="bi bi-person"></i>
                Profil
            </a>
            <a href="{{ route('produk.index') }}" class="nav-link active">
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
        <div class="content-card">
            <!-- Success/Error Messages -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-start header-section">
                <div>
                    <h4>Kelola Produk</h4>
                    <p>Daftar semua produk buket bunga</p>
                </div>
                <a href="{{ route('produk.create') }}" class="btn btn-add">
                    <i class="bi bi-plus-circle me-2"></i>Tambah Produk
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $product->gambar_produk) }}"
                                     alt="{{ $product->nama_produk }}"
                                     class="product-img"
                                     onerror="this.src='https://via.placeholder.com/50'">
                            </td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>
                                <span class="badge-category">
                                    {{ $product->kategori->nama_kategori ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-truncate-2" title="{{ $product->deskripsi_produk }}">
                                    {{ $product->deskripsi_produk ?? '-' }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($product->harga_produk, 0, ',', '.') }}</td>
                            <td>{{ $product->stok_produk }}</td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Edit Button -->
                                    <a href="{{route('produk.update', $product->id_produk)}}"
                                       class="btn-edit"
                                       title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <button class="btn-delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $product->id_produk }}"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{ $product->id_produk }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin ingin menghapus produk ini?</p>
                                                <strong>{{ $product->nama_produk }}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <form action="{{route('produk.delete', $product->id_produk)}}"
                                                      method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Belum ada produk. <a href="{{ route('produk.create') }}">Tambah produk pertama</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if(isset($products) && $products->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
