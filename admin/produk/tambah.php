<?php
include '../../Config/koneksi.php';
include '../../Config/session.php';

if(isset($_POST['simpan'])){

$file = $_FILES['gambar']['name'];
$tmp  = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp,"../../assets/uploads/".$file);

mysqli_query($conn,
"INSERT INTO produk(nama_produk,motif,harga,stok,gambar)
VALUES(
'$_POST[nama]',
'$_POST[motif]',
'$_POST[harga]',
'$_POST[stok]',
'$file'
)");

header("Location: index.php");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<div class="card p-4 shadow">

<h3>Tambah Produk Kain Tenun</h3>

<form method="POST" enctype="multipart/form-data">

<!-- NAMA PRODUK -->
<label class="form-label">Nama Kain</label>
<input name="nama" class="form-control mb-3" placeholder="Contoh: Kain Tenun Sumba Premium">

<!-- MOTIF -->
<label class="form-label">Motif Kain</label>
<input name="motif" class="form-control mb-3" placeholder="Contoh: Motif Tradisional NTT">

<!-- HARGA -->
<label class="form-label">Harga (Rp)</label>
<input type="number" name="harga" class="form-control mb-3" placeholder="Contoh: 250000">

<!-- STOK -->
<label class="form-label">Stok Tersedia</label>
<input type="number" name="stok" class="form-control mb-3" placeholder="Contoh: 10">

<!-- GAMBAR -->
<label class="form-label">Foto Kain</label>
<input type="file" name="gambar" class="form-control mb-3">

<button class="btn btn-success w-100" name="simpan">
    Simpan Produk
</button>

</form>

</div>

</div>