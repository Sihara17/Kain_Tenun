<?php
include '../Config/koneksi.php';
session_start();

$id_user = $_SESSION['id_user'];

$data = mysqli_query($conn,"
SELECT * FROM transaksi
WHERE id_user='$id_user'
ORDER BY id_transaksi DESC
");
?>