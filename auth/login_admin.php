<?php
session_start();
include '../Config/koneksi.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-4">

<div class="card p-4 shadow">

<h3 class="text-center">🧵 Admin Login</h3>

<form method="POST">

<input name="username" class="form-control mb-2" placeholder="Username" required>
<input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

<button name="login" class="btn btn-dark w-100">Login</button>

</form>

</div>

</div>

<?php
if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn,
"SELECT * FROM admin WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($data);

if($row){

// 🔐 SESSION ADMIN
$_SESSION['admin'] = $row['id_admin'];
$_SESSION['nama_admin'] = $row['nama'];

// 🚀 REDIRECT KE DASHBOARD (FIX PENTING)
header("Location: ../admin/dashboard.php");
exit();

}else{
echo "<script>alert('Login gagal! Username / Password salah');</script>";
}

}
?>