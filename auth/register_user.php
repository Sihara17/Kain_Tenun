<?php
include '../Config/koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-4">

<div class="card p-4 shadow">

<h3 class="text-center">Register User</h3>

<form method="POST">

<input name="nama" class="form-control mb-2" placeholder="Nama" required>
<input name="username" class="form-control mb-2" placeholder="Username" required>
<input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

<button name="reg" class="btn btn-success w-100">Register</button>

</form>

<!-- LINK LOGIN -->
<div class="text-center mt-3">
    <small>Sudah punya akun?</small><br>
    <a href="login_user.php" class="btn btn-outline-secondary btn-sm mt-2">
        Login
    </a>
</div>

</div>

</div>

<?php
if(isset($_POST['reg'])){

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

// CEK USERNAME DUPLIKAT
$cek = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

if(mysqli_num_rows($cek) > 0){
    echo "<script>alert('Username sudah dipakai!');</script>";
}else{

mysqli_query($conn,
"INSERT INTO users(nama,username,password)
VALUES('$nama','$username','$password')");

echo "<script>alert('Register berhasil!'); window.location='login_user.php';</script>";
}

}
?>