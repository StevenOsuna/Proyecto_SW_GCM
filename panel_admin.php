<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
</head>
<body>

<h2>Panel Administrador</h2>

<a href="ver_citas.php">Ver citas</a>

</body>
</html>