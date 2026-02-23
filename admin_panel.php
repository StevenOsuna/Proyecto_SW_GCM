<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel Administrador</title>
</head>
<body>

<h2>Bienvenido Administrador <?php echo $_SESSION['admin_usuario']; ?></h2>

<ul>
    <li><a href="admin_citas.php">Ver Citas</a></li>
    <li><a href="admin_calendario.php">Calendario</a></li>
    <li><a href="admin_horarios.php">Configurar Horarios</a></li>
    <li><a href="logout.php">Cerrar sesión</a></li>
</ul>

</body>
</html>