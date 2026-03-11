<?php
require 'config.php';
$result = $conn->query("SELECT * FROM PEMINJAMAN ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Ruang</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 14px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn:hover {
            background: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table thead {
            background: #2563eb;
            color: white;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        table tbody tr:hover {
            background: #eef2ff;
        }

        img {
            border-radius: 4px;
        }

        .aksi a {
            text-decoration: none;
            font-weight: bold;
            margin: 0 4px;
        }

        .edit {
            color: #16a34a;
        }

        .hapus {
            color: #dc2626;
        }

        .edit:hover, .hapus:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <h1>Daftar Peminjaman Ruang</h1>
        <a href="create.php" class="btn">+ Tambah Peminjaman</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        while($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_peminjam']) ?></td>
                <td><?= htmlspecialchars($row['kelas']) ?></td>
                <td><?= htmlspecialchars($row['ruangan_dipinjam']) ?></td>
                <td><?= $row['tanggal_pinjam'] ?></td>
                <td><?= $row['tanggal_kembali'] ?: '-' ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td>
                    <?php if($row['foto_peminjaman']): ?>
                        <img src="uploads/<?= $row['foto_peminjaman'] ?>" width="70">
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td class="aksi">
                    <a class="edit" href="edit.php?id=<?= $row['id_peminjaman'] ?>">Edit</a> |
                    <a class="hapus" href="delete.php?id=<?= $row['id_peminjaman'] ?>" 
                       onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
