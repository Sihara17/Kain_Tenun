<?php
include '../config/session.php';
include '../config/koneksi.php';

$total_produk = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM produk")
);

$total_transaksi = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM transaksi")
);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Admin</title>

    <link rel="stylesheet"
          href="../assets/css/style.css">

</head>

<body>

<h1>Dashboard Admin</h1>

<a href="../auth/logout.php">
    Logout
</a>

<div class="card">

    <h3>Total Produk</h3>
    <p><?= $total_produk; ?></p>

</div>

<div class="card">

    <h3>Total Transaksi</h3>
    <p><?= $total_transaksi; ?></p>

</div>

<a href="produk/index.php">
    Kelola Produk
</a>

</body>
</html>
