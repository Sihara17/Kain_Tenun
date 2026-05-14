<?php
include '../Config/koneksi.php';
session_start();

$id_user = $_SESSION['id_user'] ?? 1;

$data = mysqli_query($conn,"
SELECT cart.*, produk.nama_produk, produk.harga, produk.gambar
FROM cart
JOIN produk ON cart.id_produk = produk.id_produk
WHERE cart.id_user='$id_user'
");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<h3>Keranjang Belanja</h3>

<table class="table table-bordered">

<tr>
<th>Produk</th>
<th>Qty</th>
<th>Harga</th>
<th>Total</th>
<th>Aksi</th>
</tr>

<?php
$total = 0;

while($row=mysqli_fetch_array($data)){

$subtotal = $row['qty'] * $row['harga'];
$total += $subtotal;

?>

<tr>
<td>
<img src="../assets/uploads/<?= $row['gambar']; ?>" width="50">
<?= $row['nama_produk']; ?>
</td>

<td><?= $row['qty']; ?></td>
<td>Rp <?= number_format($row['harga']); ?></td>
<td>Rp <?= number_format($subtotal); ?></td>

<td>
<a href="delete_cart.php?id=<?= $row['id_cart']; ?>"
class="btn btn-danger btn-sm">
🗑️ Hapus
</a>
</td>

</tr>

<?php } ?>

</table>

<h4>Total: Rp <?= number_format($total); ?></h4>

<a href="checkout.php" class="btn btn-success">
💳 Checkout
</a>

</div>
<?php include 'partials/footer.php'; ?>