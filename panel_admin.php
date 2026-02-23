<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login_admin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
</head>
<body>

<h2>Panel Administrador</h2>

<a href="ver_citas.php">Ver citas</a>

</body>
</html>