<?php
include '../Config/koneksi.php';
session_start();

$id_cart = $_GET['id'];

// hapus 1 item cart
mysqli_query($conn,"DELETE FROM cart WHERE id_cart='$id_cart'");

header("Location: cart.php");
?>
<?php include 'partials/footer.php'; ?>