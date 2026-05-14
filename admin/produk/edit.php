<?php
include '../../config/koneksi.php';
include '../../config/session.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
$row = mysqli_fetch_array($data);

if (isset($_POST['update'])) {

    $nama  = $_POST['nama_produk'];
    $motif = $_POST['motif'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    // cek gambar baru
    if ($_FILES['gambar']['name'] != "") {

        $nama_file = $_FILES['gambar']['name'];
        $tmp_file  = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp_file, "../../assets/uploads/" . $nama_file);

        mysqli_query($conn, "UPDATE produk SET
        nama_produk='$nama',
        motif='$motif',
        harga='$harga',
        stok='$stok',
        gambar='$nama_file'
        WHERE id_produk='$id'");

    } else {

        mysqli_query($conn, "UPDATE produk SET
        nama_produk='$nama',
        motif='$motif',
        harga='$harga',
        stok='$stok'
        WHERE id_produk='$id'");
    }

    header("Location: index.php");
}
?>

<h2>Edit Produk</h2>

<form method="POST" enctype="multipart/form-data">

Nama <br>
<input type="text" name="nama_produk" value="<?= $row['nama_produk']; ?>"><br><br>

Motif <br>
<input type="text" name="motif" value="<?= $row['motif']; ?>"><br><br>

Harga <br>
<input type="number" name="harga" value="<?= $row['harga']; ?>"><br><br>

Stok <br>
<input type="number" name="stok" value="<?= $row['stok']; ?>"><br><br>

Gambar Lama <br>
<img src="../../assets/uploads/<?= $row['gambar']; ?>" width="80"><br><br>

Ganti Gambar <br>
<input type="file" name="gambar"><br><br>

<button type="submit" name="update">Update</button>

</form>