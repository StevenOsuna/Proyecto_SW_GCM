<?php
session_start();
include("config/conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM administradores WHERE usuario='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $admin = $result->fetch_assoc();

    if ($password == $admin['password']) {

        $_SESSION['admin'] = $admin['usuario'];
        header("Location: panel_admin.php");
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}
?>