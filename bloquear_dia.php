<?php
require_once("conexion.php");

$fecha = $_GET['fecha'];

$sql = "INSERT INTO dias_bloqueados (fecha) VALUES ('$fecha')";
$conn->query($sql);

header("Location: admin_calendario.php");
?>