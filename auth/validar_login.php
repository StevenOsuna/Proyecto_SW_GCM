<?php
session_start();
include("../config/conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM pacientes WHERE email = '$email'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];

        header("Location: paciente/panel.php");
        exit();

    } else {
        echo "Contraseña incorrecta";
    }

} else {
    echo "Usuario no encontrado";
}

$conn->close();
?>