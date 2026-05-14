<?php
include '../Config/koneksi.php';
session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">

<div class="container mt-4">

<h2>Katalog Kain Tenun</h2>

<div class="row">

<?php
$data = mysqli_query($conn,"SELECT * FROM produk");

while($row=mysqli_fetch_array($data)){
?>

<div class="col-md-3">

<div class="card product-card mb-3">

<!-- GAMBAR -->
<img src="../assets/uploads/<?= $row['gambar']; ?>"
onerror="this.src='../assets/images/default.png'"
style="height:200px;object-fit:cover;">

<div class="card-body">

<!-- NAMA -->
<h5><?= $row['nama_produk']; ?></h5>

<!-- HARGA -->
<p>Rp <?= number_format($row['harga']); ?></p>

<!-- 🛒 ADD TO CART -->
<a href="add_cart.php?id=<?= $row['id_produk']; ?>"
class="btn btn-warning btn-sm w-100 mb-2">
🛒 Add to Cart
</a>

<!-- 💳 BUY NOW (langsung checkout flow) -->
<a href="add_cart.php?id=<?= $row['id_produk']; ?>&buy=1"
class="btn btn-success btn-sm w-100">
💳 Beli Sekarang
</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div> 
<?php include 'partials/footer.php'; ?> 