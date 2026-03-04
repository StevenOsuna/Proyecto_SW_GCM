<?php
session_start();
include("../config/conexion.php");

// Seguridad
if (!isset($_SESSION['usuario_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: panel.php");
    exit();
}

$id = $_SESSION['usuario_id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<?php
// Actualizar en la tabla 'pacientes' 
$sql = "UPDATE pacientes SET nombre = ?, telefono = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nombre, $telefono, $id);

if ($stmt->execute()) {
    // E nombre en la sesión para que el saludo cambie al instante
    $_SESSION['usuario_nombre'] = $nombre;

    echo "<script>
        Swal.fire({
            title: '¡Perfil Actualizado!',
            text: 'Tus datos se han guardado correctamente.',
            icon: 'success',
            confirmButtonText: 'Genial',
            confirmButtonColor: '#007bff',
            customClass: { popup: 'rounded-4' }
        }).then(() => {
            window.location.href = 'perfil.php';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'No pudimos actualizar tus datos. Inténtalo de nuevo.',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        }).then(() => {
            window.location.href = 'perfil.php';
        });
    </script>";
}

$conn->close();
?>
</body>
</html>
