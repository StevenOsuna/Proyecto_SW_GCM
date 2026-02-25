<?php

include("config/conexion.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO pacientes (nombre, telefono, email, password)
        VALUES ('$nombre', '$telefono', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>