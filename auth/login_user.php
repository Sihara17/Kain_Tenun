<?php
session_start();
include '../Config/koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-4">

<div class="card p-4 shadow">

<h3 class="text-center">Login User</h3>

<form method="POST">

<input name="username" class="form-control mb-2" placeholder="Username" required>
<input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

<button name="login" class="btn btn-primary w-100">Login</button>

</form>

<div class="text-center mt-3">
    <small>Belum punya akun?</small><br>
    <a href="register_user.php" class="btn btn-outline-primary btn-sm mt-2">
        Register
    </a>
</div>

</div>

</div>

<?php
if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn,
"SELECT * FROM users WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($data);

if($row){

$_SESSION['id_user'] = $row['id_user'];
$_SESSION['nama'] = $row['nama'];

// 🔥 FIX: arahkan ke DASHBOARD (index.php)
header("Location: ../user/index.php");
exit();

}else{
echo "<script>alert('Login gagal! Username / Password salah');</script>";
}

}
?>