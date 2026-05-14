<?php
include '../Config/koneksi.php';
session_start();

$login = isset($_SESSION['id_user']);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-3">

<a class="navbar-brand" href="#">🧵 Kain Tenun</a>

<div>

<a href="index.php" class="btn btn-light btn-sm">Home</a>
<a href="katalog.php" class="btn btn-light btn-sm">Katalog</a>
<a href="cart.php" class="btn btn-warning btn-sm">🛒 Cart</a>

<?php if($login){ ?>
    <a href="../auth/logout_user.php" class="btn btn-danger btn-sm">Logout</a>
<?php }else{ ?>
    <a href="../auth/login_user.php" class="btn btn-primary btn-sm">Login</a>
<?php } ?>

</div>

</nav>

<!-- HERO -->
<div class="container mt-4">

<div class="p-4 bg-light rounded shadow-sm mb-4">

<h2>Selamat Datang di Kain Tenun</h2>

<?php if($login){ ?>
<p>Halo, <?= $_SESSION['nama']; ?> 👋</p>
<?php }else{ ?>
<p>Silakan login untuk mulai belanja</p>
<?php } ?>

<a href="katalog.php" class="btn btn-primary">
🛍️ Lihat Katalog
</a>

</div>

<!-- PRODUK -->
<h4>🔥 Produk Terbaru</h4>

<div class="row">

<?php
$data = mysqli_query($conn,"SELECT * FROM produk LIMIT 8");

while($row=mysqli_fetch_array($data)){
?>

<div class="col-md-3">

<div class="card mb-3 shadow-sm">

<img src="../assets/uploads/<?= $row['gambar']; ?>"
onerror="this.src='../assets/images/default.png'"
style="height:200px;object-fit:cover;">

<div class="card-body">

<h6><?= $row['nama_produk']; ?></h6>

<p class="text-danger">
Rp <?= number_format($row['harga']); ?>
</p>

<a href="detail.php?id=<?= $row['id_produk']; ?>"
class="btn btn-primary btn-sm w-100">
Lihat Detail
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>
<?php include 'partials/footer.php'; ?>