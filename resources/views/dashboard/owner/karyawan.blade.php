<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Karyawan - BrownyGift</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffeef8, #ffd1e8);
            font-family: 'Segoe UI';
            min-height: 100vh;
        }

        .card-custom {
            background: white;
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(216, 27, 96, 0.25);
            transition: 0.4s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 55px rgba(216, 27, 96, 0.35);
        }

        .btn-pink {
            background: linear-gradient(90deg, #d81b60, #880e4f);
            color: white;
            border-radius: 12px;
            padding: 12px 25px;
            font-weight: bold;
            transition: 0.3s;
            border: none;
        }

        .btn-pink:hover {
            opacity: .85;
            transform: scale(1.03);
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

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
        }

        .page-title {
            font-weight: bold;
            color: #880e4f;
        }
    </style>
</head>

<body>

<div class="container py-5">
    <h2 class="page-title mb-4 text-center">Tambah Akun Karyawan</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-custom">

                <form method="POST" action="/owner/karyawan">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Karyawan</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password Akun</label>
                        <input type="password" name="password" class="form-control" required minlength="6">
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn-pink">
                            Buat Akun Karyawan
                        </button>
                    </div>

                    <div class="text-end mb-4">
                        <a href="/owner" class="btn-back">← Kembali</a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

</body>
</html>
