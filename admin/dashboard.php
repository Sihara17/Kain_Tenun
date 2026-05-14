<?php
include '../config/session.php';
include '../config/koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<?php include 'partials/sidebar.php'; ?>
<?php include 'partials/navbar.php'; ?>

<!-- CONTENT WRAPPER -->
<div style="margin-left:250px; padding:20px;">

<?php
$produk = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) AS total FROM produk"));
$user = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) AS total FROM users"));
$transaksi = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) AS total FROM transaksi"));
?>

<h3>📊 Dashboard Admin</h3>

<div class="row mt-4">

<div class="col-md-3">
<div class="card bg-primary text-white p-3">
<h5>Produk</h5>
<h3><?= $produk['total']; ?></h3>
<a href="produk/index.php" class="text-white">Lihat →</a>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white p-3">
<h5>User</h5>
<h3><?= $user['total']; ?></h3>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-dark p-3">
<h5>Transaksi</h5>
<h3><?= $transaksi['total']; ?></h3>
<a href="transaksi/index.php">Lihat →</a>
</div>
</div>

</div>

</div>

<?php include 'partials/footer.php'; ?>