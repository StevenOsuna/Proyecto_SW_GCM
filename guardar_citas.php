<?php
session_start();
include("conexion.php");

$paciente_id = $_SESSION['usuario_id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

/* VALIDAR SI YA EXISTE */

$verificar = "SELECT * FROM citas 
              WHERE fecha='$fecha' AND hora='$hora'";

$resultado = $conn->query($verificar);

if ($resultado->num_rows > 0) {

    echo "Horario no disponible <br>";
    echo "<a href='citas.php'>Volver</a>";
    exit();
}

/* GUARDAR */

$sql = "INSERT INTO citas (paciente_id, fecha, hora)
        VALUES ('$paciente_id', '$fecha', '$hora')";

if ($conn->query($sql) === TRUE) {

    echo "Cita agendada correctamente <br>";
    echo "<a href='panel.php'>Volver al panel</a>";

} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>