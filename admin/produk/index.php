<?php
include '../../config/session.php';
include '../../config/koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<?php include '../partials/sidebar.php'; ?>
<?php include '../partials/navbar.php'; ?>

<div style="margin-left:250px; padding:20px;">

<h3>🛍 Data Produk</h3>

<a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

<table class="table table-bordered">

<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;
$data = mysqli_query($conn,"SELECT * FROM produk");

while($row = mysqli_fetch_array($data)){
?>

<tr>
<td><?= $no++; ?></td>
<td><?= $row['nama_produk']; ?></td>
<td>Rp <?= number_format($row['harga']); ?></td>
<td><?= $row['stok']; ?></td>
<td>
<a href="edit.php?id=<?= $row['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="hapus.php?id=<?= $row['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>

<?php include '../partials/footer.php'; ?>