<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>

<h2>Bienvenido Administrador <?php echo $_SESSION['admin_usuario']; ?></h2>

<ul>
    <li><a href="admin_citas.php">Ver Citas</a></li>
    <li><a href="admin_calendario.php">Calendario</a></li>
    <li><a href="admin_horarios.php">Configurar Horarios</a></li>
    <li><a href="../config/logout.php">Cerrar sesión</a></li>
</ul>

</body>
</html>