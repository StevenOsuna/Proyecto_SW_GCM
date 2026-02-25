<?php
session_start();
require_once("../config/conexion.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit();
}

$sql = "SELECT citas.*, pacientes.nombre 
        FROM citas 
        JOIN pacientes ON citas.paciente_id = pacientes.id
        ORDER BY fecha, hora";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Citas Agendadas</title>
</head>
<body>

<h2>Citas Registradas</h2>

<table border="1">
    <tr>
        <th>Paciente</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>

<?php while ($fila = $resultado->fetch_assoc()) { ?>

<tr>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['fecha']; ?></td>
    <td><?php echo $fila['hora']; ?></td>
</tr>

<?php } ?>

</table>

<br>
<a href="admin_panel.php">Volver</a>

</body>
</html>