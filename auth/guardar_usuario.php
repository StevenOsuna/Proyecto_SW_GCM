<?php
include("../config/conexion.php");

// Recibir y limpiar datos básicos
$nombre   = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Preparar la consulta
$sql = "INSERT INTO pacientes (nombre, telefono, email, password)
        VALUES ('$nombre', '$telefono', '$email', '$password')";

// Variable para manejar el mensaje en el HTML
$registro_exitoso = false;
$error_mensaje = "";

if ($conn->query($sql) === TRUE) {
    $registro_exitoso = true;
} else {
    $error_mensaje = $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Registro - Dr. Diego Rojas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    
    <?php if ($registro_exitoso): ?>
    <meta http-equiv="refresh" content="5;url=auth/login.php" />
    <?php endif; ?>
</head>
<body class="bg-light">

    <main class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4 text-center">
                
                <div class="card border-0 shadow-lg p-4" style="border-radius: 20px;">
                    <div class="card-body">
                        
                        <?php if ($registro_exitoso): ?>
                            <div class="mb-4">
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                            </div>
                            <h2 class="fw-bold text-dark mb-3">¡Registro Exitoso!</h2>
                            <p class="text-muted mb-4">
                                Tu cuenta ha sido creada correctamente. En unos segundos serás redirigido al inicio de sesión.
                            </p>
                            <div class="d-grid gap-2">
                                <a href="auth/login.php" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Ir al Login ahora
                                </a>
                            </div>
                            <div class="mt-4">
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                            </div>

                        <?php else: ?>
                            <div class="mb-4">
                                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 5rem;"></i>
                            </div>
                            <h2 class="fw-bold text-dark mb-3">Hubo un problema</h2>
                            <p class="text-muted mb-4">
                                No pudimos completar tu registro por el siguiente motivo:<br>
                                <small class="text-danger"><?php echo $error_mensaje; ?></small>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="auth/registro.php" class="btn btn-danger btn-lg rounded-pill fw-bold shadow-sm">
                                    Intentar de nuevo
                                </a>
                                <a href="index.php" class="btn btn-outline-secondary rounded-pill fw-bold">
                                    Regresar al Inicio
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                
            </div>
        </div>
    </main>

</body>
</html>