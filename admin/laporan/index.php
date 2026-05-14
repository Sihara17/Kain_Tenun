<?php
include '../../config/koneksi.php';

$data = mysqli_query($conn,
"SELECT transaksi.*, users.nama, produk.nama_produk
FROM transaksi
JOIN users ON transaksi.id_user=users.id_user
JOIN produk ON transaksi.id_produk=produk.id_produk");
?>

<h2>Laporan Penjualan</h2>

<table border="1" cellpadding="10">

<tr>
<th>User</th>
<th>Produk</th>
<th>Jumlah</th>
<th>Total</th>
</tr>

<?php while($row=mysqli_fetch_array($data)) { ?>

<tr>
<td><?= $row['nama']; ?></td>
<td><?= $row['nama_produk']; ?></td>
<td><?= $row['jumlah']; ?></td>
<td><?= $row['total_harga']; ?></td>
</tr>

<?php } ?>

</table>