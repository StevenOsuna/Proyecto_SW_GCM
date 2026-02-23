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

<p>Panel de paciente</p>

<!-- BOTÓN PARA AGENDAR CITA -->
<a href="citas.php">Agendar Cita</a>

<br><br>

<!-- BOTÓN CERRAR SESIÓN -->
<a href="logout.php">Cerrar sesión</a>

</body>
</html>