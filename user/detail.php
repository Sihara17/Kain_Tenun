<?php
include '../Config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM produk WHERE id_produk='$id'");
$row = mysqli_fetch_array($data);

if(isset($_POST['add'])){

mysqli_query($conn,
"INSERT INTO cart(id_user,id_produk,qty)
VALUES('1','$id','$_POST[qty]')");

header("Location: cart.php");
}
?>

<h2><?= $row['nama_produk']; ?></h2>
<img src="../assets/uploads/<?= $row['gambar']; ?>" width="200">

<form method="POST">

<input type="number" name="qty" value="1">

<button name="add">Add to Cart</button>

</form>
<?php include 'partials/footer.php'; ?>