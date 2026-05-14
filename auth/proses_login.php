<?php

session_start();

include '../config/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn,
"SELECT * FROM user 
WHERE username='$username'
AND password='$password'");

$data = mysqli_num_rows($query);

if($data > 0){

    $_SESSION['login'] = true;

    header("Location: ../admin/dashboard.php");

}else{

    echo "Login Gagal";

}

?>