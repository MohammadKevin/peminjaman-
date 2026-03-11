<?php
require 'config.php';

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM PEMINJAMAN WHERE id_peminjaman=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 520px;
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
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .foto-lama {
            text-align: center;
            margin-bottom: 15px;
        }

        .foto-lama img {
            max-width: 150px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .btn {
            width: 100%;
            background: #16a34a;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background: #15803d;
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
    <h1>Edit Peminjaman</h1>

    <form action="proses_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman'] ?>">

        <label>Nama Peminjam</label>
        <input type="text" name="nama_peminjam"
               value="<?= htmlspecialchars($data['nama_peminjam']) ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas"
               value="<?= htmlspecialchars($data['kelas']) ?>">

        <label>Ruangan</label>
        <input type="text" name="ruangan_dipinjam"
               value="<?= htmlspecialchars($data['ruangan_dipinjam']) ?>" required>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam"
               value="<?= $data['tanggal_pinjam'] ?>" required>

        <label>Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali"
               value="<?= $data['tanggal_kembali'] ?>">

        <label>Keterangan</label>
        <textarea name="keterangan"><?= htmlspecialchars($data['keterangan']) ?></textarea>

        <label>Foto Lama</label>
        <div class="foto-lama">
            <?php if ($data['foto_peminjaman']): ?>
                <img src="uploads/<?= $data['foto_peminjaman'] ?>">
            <?php else: ?>
                <em>Tidak ada foto</em>
            <?php endif; ?>
        </div>

        <label>Ganti Foto (Opsional)</label>
        <input type="file" name="foto_peminjaman" accept="image/*">

        <button type="submit" class="btn">Update Data</button>
    </form>

    <a class="back-link" href="index.php">← Kembali ke Daftar</a>
</div>

</body>
</html>
