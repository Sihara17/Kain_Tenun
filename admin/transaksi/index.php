<?php
include '../../Config/koneksi.php';
include '../../Config/session.php';

$data = mysqli_query($conn,"SELECT * FROM transaksi");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<h3>Transaksi</h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Total</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_array($data)){ ?>

<tr>
<td><?= $row['id_transaksi']; ?></td>
<td><?= $row['total']; ?></td>
<td><?= $row['status']; ?></td>
<td>
<a href="update.php?id=<?= $row['id_transaksi']; ?>"
class="btn btn-success btn-sm">Approve</a>
</td>
</tr>

<?php } ?>

</table>

</div>