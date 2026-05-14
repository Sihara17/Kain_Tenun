<?php
include '../../Config/koneksi.php';
include '../../Config/session.php';

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE transaksi SET status='success'
WHERE id_transaksi='$id'
");

header("Location: index.php");
?>