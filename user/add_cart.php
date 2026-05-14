<?php
include '../Config/koneksi.php';
session_start();

$id_user = $_SESSION['id_user'] ?? 1;
$id_produk = $_GET['id'];

// cek cart
$cek = mysqli_query($conn,"
SELECT * FROM cart 
WHERE id_user='$id_user' AND id_produk='$id_produk'
");

if(mysqli_num_rows($cek) > 0){

mysqli_query($conn,"
UPDATE cart SET qty = qty + 1
WHERE id_user='$id_user' AND id_produk='$id_produk'
");

}else{

mysqli_query($conn,"
INSERT INTO cart(id_user,id_produk,qty)
VALUES('$id_user','$id_produk',1)
");

}

// 🔥 INI YANG PENTING (FLOW BUY NOW)
if(isset($_GET['buy'])){
header("Location: checkout.php");
}else{
header("Location: cart.php");
}
?>
<?php include 'partials/footer.php'; ?>