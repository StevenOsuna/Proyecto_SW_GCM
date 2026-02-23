<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Paciente</title>
</head>
<body>

<h2>Bienvenido <?php echo $_SESSION['usuario_nombre']; ?></h2>

<p>Aquí irá el sistema de citas.</p>

<a href="logout.php">Cerrar sesión</a>

</body>
</html>