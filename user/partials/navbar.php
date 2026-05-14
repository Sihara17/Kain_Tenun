<?php
session_start();
$login = isset($_SESSION['id_user']);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-dark bg-dark navbar-expand-lg px-3">

<a class="navbar-brand" href="index.php">🧵 Kain Tenun</a>

<div class="ms-auto">

<a href="index.php" class="btn btn-light btn-sm">Home</a>
<a href="katalog.php" class="btn btn-light btn-sm">Katalog</a>
<a href="cart.php" class="btn btn-warning btn-sm">🛒 Cart</a>

<?php if($login){ ?>
    <a href="../auth/logout_user.php" class="btn btn-danger btn-sm">Logout</a>
<?php }else{ ?>
    <a href="../auth/login_user.php" class="btn btn-primary btn-sm">Login</a>
<?php } ?>

</div>

</nav>