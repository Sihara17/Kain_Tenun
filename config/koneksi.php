<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "kain_tenun"
);

if(!$conn){
    die("Koneksi Database Gagal");
}

?>