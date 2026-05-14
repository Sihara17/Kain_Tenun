<?php
session_start();
include 'Config/koneksi.php';

// 🔐 kalau belum login → arahkan ke login user
if(!isset($_SESSION['id_user'])){
    header("Location: auth/login_user.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kain Tenun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">

<a class="navbar-brand" href="#">🧵 Kain Tenun</a>

<div>
    <a href="user/index.php" class="btn btn-light btn-sm">Dashboard</a>
    <a href="user/katalog.php" class="btn btn-warning btn-sm">Katalog</a>
    <a href="auth/logout_user.php" class="btn btn-danger btn-sm">Logout</a>
</div>

</nav>

<!-- HERO -->
<div class="container mt-4">

<div class="p-5 bg-light rounded shadow-sm text-center">

<h2>🧵 Kain Tenun Indonesia</h2>
<p>Selamat datang, <?= $_SESSION['nama']; ?> 👋</p>

<a href="user/katalog.php" class="btn btn-primary">
🛍️ Mulai Belanja
</a>

</div>

<!-- PRODUK -->
<h4 class="mt-4">🔥 Produk Terbaru</h4>

<div class="row">

<?php
$data = mysqli_query($conn,"SELECT * FROM produk LIMIT 8");

while($row=mysqli_fetch_array($data)){

$gambar = !empty($row['gambar'])
    ? "assets/uploads/".$row['gambar']
    : "assets/images/default.png";
?>

<div class="col-md-3">

<div class="card mb-3 shadow-sm">

<img src="<?= $gambar ?>"
style="height:200px;object-fit:cover;">

<div class="card-body">

<h6><?= $row['nama_produk']; ?></h6>
<p class="text-danger">Rp <?= number_format($row['harga']); ?></p>

<a href="user/detail.php?id=<?= $row['id_produk']; ?>"
class="btn btn-primary btn-sm w-100">
Lihat
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>