<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<footer class="bg-dark text-white mt-5 p-4">

<div class="container">

<div class="row">

<!-- INFO -->
<div class="col-md-4">
<h5>🧵 Kain Tenun</h5>
<p>Platform penjualan kain tenun tradisional Indonesia.</p>
<p>Email: support@kain-tenun.com</p>
<p>Alamat: Bekasi, Indonesia</p>
</div>

<!-- FORM SARAN -->
<div class="col-md-4">

<h5>Saran & Kritik</h5>

<form method="POST">

<input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
<textarea name="pesan" class="form-control mb-2" placeholder="Pesan"></textarea>

<button class="btn btn-primary btn-sm w-100" name="kirim">
Kirim
</button>

</form>

<?php
include '../Config/koneksi.php';

if(isset($_POST['kirim'])){
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

mysqli_query($conn,"INSERT INTO saran(nama,pesan)
VALUES('$nama','$pesan')");
}
?>

</div>

<!-- SOSMED -->
<div class="col-md-4">
<h5>Kontak</h5>
<p>📧 email: support@kain-tenun.com</p>
<p>📞 WhatsApp: 08xxxxxxxx</p>
<p>📍 Bekasi, Indonesia</p>
</div>

</div>

<hr>

<center>
<p>© 2026 Kain Tenun - All Rights Reserved</p>
</center>

</div>

</footer>