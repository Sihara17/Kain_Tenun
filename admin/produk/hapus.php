<?php
include '../../config/koneksi.php';
include '../../config/session.php';

$id = $_GET['id'];

// ambil data gambar
$data = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
$row = mysqli_fetch_array($data);

// hapus file gambar
unlink("../../assets/uploads/" . $row['gambar']);

// hapus data
mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id'");

header("Location: index.php");
?>