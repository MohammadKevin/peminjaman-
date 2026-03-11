<?php
require 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT foto_peminjaman FROM PEMINJAMAN WHERE id_peminjaman = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data && !empty($data['foto_peminjaman'])) {
    $filePath = "uploads/" . $data['foto_peminjaman'];
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

$stmt = $conn->prepare("DELETE FROM PEMINJAMAN WHERE id_peminjaman = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
exit();
