<?php
session_start();
require_once("../config/conexion.php");

/* =========================
   SEGURIDAD ADMIN
========================= */

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../auth/login_admin.php");
    exit();
}

/* =========================
   VALIDAR FECHA
========================= */

if (!isset($_GET['fecha']) || empty($_GET['fecha'])) {
    header("Location: admin_calendario.php");
    exit();
}

$fecha = $_GET['fecha'];

/* =========================
   EVITAR DUPLICADOS
========================= */

$stmt_check = $conn->prepare("SELECT id FROM dias_bloqueados WHERE fecha = ?");
$stmt_check->bind_param("s", $fecha);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows == 0) {

    $stmt = $conn->prepare("INSERT INTO dias_bloqueados (fecha) VALUES (?)");
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
}

/* =========================
   REDIRECCIÓN
========================= */

header("Location: admin_calendario.php");
exit();