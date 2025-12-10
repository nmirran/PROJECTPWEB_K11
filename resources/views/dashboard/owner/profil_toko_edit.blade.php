<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Toko - BrownyGift</title>

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

        .card-edit {
            background: white;
            border-radius: 25px;
            padding: 40px;
            max-width: 650px;
            margin: auto;
            box-shadow: 0 15px 45px rgba(216, 27, 96, 0.25);
            animation: fadeIn .4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .btn-save {
            background: #d81b60;
            color: white;
            padding: 12px 28px;
            border-radius: 12px;
            border: none;
            font-weight: bold;
        }

        .btn-save:hover {
            opacity: .9;
        }

        .btn-back {
            background: #880e4f;
            color: white;
            border-radius: 12px;
            padding: 10px 18px;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="text-center title">Edit Profil Toko</h2>

    <div class="text-end mb-4">
        <a href="/owner/profil_toko" class="btn-back">← Kembali</a>
    </div>

    <div class="card-edit">

        <form action="/owner/profil_toko_edit" method="POST">
            @csrf

            <!-- Nama Toko -->
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control"
                       value="{{ $toko->nama_toko }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required>{{ $toko->deskripsi }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-bold">Status Toko</label>
                <select name="status" class="form-select" required>
                    <option value="buka" {{ $toko->status == 'buka' ? 'selected' : '' }}>Buka</option>
                    <option value="tutup" {{ $toko->status == 'tutup' ? 'selected' : '' }}>Tutup</option>
                </select>
            </div>

            <div class="text-center mt-4">
                <button class="btn-save" type="submit">Simpan Perubahan</button>
            </div>

        </form>

    </div>

</div>

</body>
</html>
