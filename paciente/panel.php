<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Paciente</title>
</head>
<body>

<h2>Bienvenido <?php echo $_SESSION['usuario_nombre']; ?></h2>

<p>Panel de paciente</p>

<!-- BOTÓN PARA AGENDAR CITA -->
<a href="../citas.php">Agendar Cita</a>

<br><br>

<!-- BOTÓN CERRAR SESIÓN -->
<a href="../config/logout.php">Cerrar sesión</a>

</body>
</html>