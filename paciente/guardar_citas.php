<?php
session_start();
include("../config/conexion.php");

// 1. Seguridad de sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$paciente_id = $_SESSION['usuario_id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando Cita...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-light">

<?php
/* 2. VALIDACIÓN CON SENTENCIAS PREPARADAS (Protección contra hackers) */
$stmt_check = $conn->prepare("SELECT id FROM citas WHERE fecha = ? AND hora = ?");
$stmt_check->bind_param("ss", $fecha, $hora);
$stmt_check->execute();
$resultado = $stmt_check->get_result();

if ($resultado->num_rows > 0) {
    echo "<script>
        Swal.fire({
            title: 'Horario Ocupado',
            text: 'Este espacio acaba de ser reservado. Por favor, intenta con otro horario.',
            icon: 'warning',
            confirmButtonText: 'Elegir otro',
            customClass: { popup: 'rounded-4' }
        }).then(() => { window.location.href = '../citas.php'; });
    </script>";
    exit();
}

/* 3. GUARDAR CITA */
$stmt_insert = $conn->prepare("INSERT INTO citas (paciente_id, fecha, hora) VALUES (?, ?, ?)");
$stmt_insert->bind_param("iss", $paciente_id, $fecha, $hora);

if ($stmt_insert->execute()) {
    echo "<script>
        Swal.fire({
            title: '¡Cita Confirmada!',
            text: 'Te esperamos el día $fecha a las $hora.',
            icon: 'success',
            confirmButtonText: 'Ir a mi panel',
            confirmButtonColor: '#28a745'
        }).then(() => { window.location.href = 'panel.php'; });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema técnico al guardar tu cita.',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        }).then(() => { window.location.href = 'panel.php'; });
    </script>";
}

$conn->close();
?>
</body>
</html>