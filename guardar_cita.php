<?php
session_start();
include("conexion.php");

$paciente_id = $_SESSION['usuario_id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$sql = "INSERT INTO citas (paciente_id, fecha, hora)
        VALUES ('$paciente_id', '$fecha', '$hora')";

if ($conn->query($sql) === TRUE) {
    echo "Cita agendada correctamente <br>";
    echo "<a href='panel.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>