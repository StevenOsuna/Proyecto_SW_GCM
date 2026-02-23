<?php
session_start();
require_once("conexion.php");

if (!isset($_POST['usuario']) || !isset($_POST['password'])) {
    die("Acceso inválido");
}

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM administradores WHERE usuario='$usuario'";
$resultado = $conn->query($sql);

if ($fila = $resultado->fetch_assoc()) {

    if (password_verify($password, $fila['password'])) {

        $_SESSION['admin_id'] = $fila['id'];
        $_SESSION['admin_usuario'] = $fila['usuario'];

        header("Location: admin_panel.php");
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>