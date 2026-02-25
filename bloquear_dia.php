<?php
require_once("config/conexion.php");

$fecha = $_GET['fecha'];

$sql = "INSERT INTO dias_bloqueados (fecha) VALUES ('$fecha')";
$conn->query($sql);

header("Location: admin/admin_calendario.php");
?>