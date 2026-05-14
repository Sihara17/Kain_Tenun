<?php
include '../Config/koneksi.php';
session_start();

$id_user = $_SESSION['id_user'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];

/* ambil cart */
$cart = mysqli_query($conn,"
SELECT cart.*, produk.harga
FROM cart
JOIN produk ON cart.id_produk = produk.id_produk
WHERE cart.id_user='$id_user'
");

$total = 0;

while($row = mysqli_fetch_array($cart)){
    $total += $row['qty'] * $row['harga'];
}

/* SIMPAN TRANSAKSI */
mysqli_query($conn,"
INSERT INTO transaksi (
id_user,
nama_pembeli,
email,
no_hp,
total_harga,
status,
tanggal
)
VALUES (
'$id_user',
'$nama',
'$email',
'$no_hp',
'$total',
'paid',
NOW()
)
");

/* HAPUS CART */
mysqli_query($conn,"DELETE FROM cart WHERE id_user='$id_user'");

header("Location: invoice.php");
exit;
?>