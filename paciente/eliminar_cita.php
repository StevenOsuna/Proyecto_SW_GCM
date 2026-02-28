<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['usuario_id']) || !isset($_GET['id'])) {
    header("Location: mis_citas.php");
    exit();
}

$id = $_GET['id'];
$paciente_id = $_SESSION['usuario_id'];

$sql = "DELETE FROM citas WHERE id = ? AND paciente_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $paciente_id);

if ($stmt->execute()) {
    header("Location: mis_citas.php?mensaje=eliminado");
} else {
    header("Location: mis_citas.php?error=1");
}
?>
