<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn,
"SELECT * FROM users WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($data);

if($row){

$_SESSION['id_user'] = $row['id_user'];
$_SESSION['nama'] = $row['nama'];

// REDIRECT USER
header("Location: ../user/katalog.php");

}else{

echo "Login gagal";

}
?>