<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            background: #ffffff;
            margin: 40px auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input[type="submit"] {
            width: 100%;
            background: #2563eb;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #1e40af;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #2563eb;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Peminjaman</h1>

    <form action="proses_create.php" method="post" enctype="multipart/form-data">
        <label>Nama Peminjam</label>
        <input type="text" name="nama_peminjam" required>

        <label>Kelas</label>
        <input type="text" name="kelas">

        <label>Ruangan</label>
        <input type="text" name="ruangan_dipinjam" required>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali">

        <label>Keterangan</label>
        <textarea name="keterangan"></textarea>

        <label>Foto Peminjaman</label>
        <input type="file" name="foto_peminjaman" accept="image/*">

        <input type="submit" value="Simpan">
    </form>

    <a class="back-link" href="index.php">← Kembali</a>
</div>

</body>
</html>
