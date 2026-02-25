<?php
session_start();
include("config/conexion.php");

$sql = "SELECT c.fecha, c.hora, p.nombre 
        FROM citas c
        JOIN pacientes p ON c.paciente_id = p.id";

$result = $conn->query($sql);
?>

<h2>Citas Agendadas</h2>

<table border="1">

<tr>
<th>Paciente</th>
<th>Fecha</th>
<th>Hora</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>

<tr>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['fecha']; ?></td>
<td><?php echo $row['hora']; ?></td>
</tr>

<?php } ?>

</table>