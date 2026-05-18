<?php

require_once '../config/config.php';
session_start();
require_once("../config/conexion.php");

/* =========================
   VALIDAR MÉTODO POST
========================= */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../auth/login_admin.php");
    exit();
}

/* =========================
   LIMPIAR DATOS
========================= */

$usuario = trim($_POST['usuario'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($usuario) || empty($password)) {
    header("Location:" . BASE_URL . "auth/login_admin.php?error=campos");
    exit();
}

/* =========================
   CONSULTA SEGURA (PREPARED)
========================= */

$stmt = $conn->prepare("SELECT id, usuario, password FROM administradores WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($admin = $result->fetch_assoc()) {

    if (password_verify($password, $admin['password'])) {

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_usuario'] = $admin['usuario'];

        header("Location:". BASE_URL. "admin/admin_panel.php");
        exit();

    } else {
        header("Location:". BASE_URL. "auth/login_admin.php?error=pass");
        exit();
    }

} else {
    header("Location:". BASE_URL. "auth/login_admin.php?error=user");
    exit();
}