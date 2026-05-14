<?php
session_start();
include '../config/koneksi.php';

// wajib login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../auth/login_user.php");
}

$id_user = $_SESSION['id_user'];
$id_produk = $_GET['id'];

// ambil data produk
$data = mysqli_query($conn,
"SELECT * FROM produk WHERE id_produk='$id_produk'");

$row = mysqli_fetch_array($data);

if (isset($_POST['beli'])) {

    $jumlah = $_POST['jumlah'];
    $total = $jumlah * $row['harga'];

    mysqli_query($conn,
    "INSERT INTO transaksi
    (id_user, id_produk, jumlah, total_harga)
    VALUES
    ('$id_user', '$id_produk', '$jumlah', '$total')");

    echo "✔ Pembelian berhasil!";
}
?>

<h2>Checkout Produk</h2>

Nama: <?= $row['nama_produk']; ?><br>
Harga: Rp <?= $row['harga']; ?><br><br>

<form method="POST">

Jumlah <br>
<input type="number" name="jumlah" required><br><br>

<button name="beli">Beli Sekarang</button>

</form>