<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$paciente_id = $_SESSION['usuario_id'];
$nombreUsuario = isset($_SESSION['usuario_nombre']) ? explode(' ', $_SESSION['usuario_nombre'])[0] : 'Paciente';

// Consulta para la próxima cita
$sql_proxima = "SELECT fecha, hora FROM citas WHERE paciente_id = ? AND fecha >= CURDATE() ORDER BY fecha ASC, hora ASC LIMIT 1";
$stmt_p = $conn->prepare($sql_proxima);
$stmt_p->bind_param("i", $paciente_id);
$stmt_p->execute();
$proxima_cita = $stmt_p->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Paciente - Dr. Diego Rojas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-light">

    <?php $pageTitle = "Mi Panel"; include 'estructura/navbar.php'; ?>

    <main class="container py-5" style="margin-top: 80px;">
        <div class="row mb-4">
            <div class="col-12 text-center text-md-start">
                <h1 class="fw-bold">Hola, <span class="text-primary"><?php echo htmlspecialchars($nombreUsuario); ?></span> 👋</h1>
                <p class="text-muted">¿Qué desea realizar hoy?</p>
            </div>
        </div>

        <?php if ($proxima_cita): ?>
        <div class="alert alert-primary border-0 shadow-sm rounded-4 mb-4 d-flex align-items-center">
            <i class="bi bi-calendar-check-fill fs-3 me-3 text-primary"></i>
            <div>
                <span class="d-block fw-bold">Próxima Cita</span>
                <small>El <?php echo date('d/m/Y', strtotime($proxima_cita['fecha'])); ?> a las <?php echo date('h:i A', strtotime($proxima_cita['hora'])); ?></small>
            </div>
        </div>
        <?php endif; ?>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center rounded-4">
                    <i class="bi bi-calendar-plus text-primary fs-1 mb-3"></i>
                    <h4>Agendar Cita</h4>
                    <a href="../citas.php" class="btn btn-primary rounded-pill mt-auto">Nueva Cita</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center rounded-4">
                    <i class="bi bi-clipboard2-pulse text-primary fs-1 mb-3"></i>
                    <h4>Mis Consultas</h4>
                    <a href="mis_citas.php" class="btn btn-outline-primary rounded-pill mt-auto">Ver Detalles</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 p-4 text-center rounded-4">
                    <i class="bi bi-person-gear text-primary fs-1 mb-3"></i>
                    <h4>Mi Perfil</h4>
                    <a href="perfil.php" class="btn btn-outline-secondary rounded-pill mt-auto">Gestionar</a>
                </div>
            </div>
        </div>
    </main>

    <?php include 'estructura/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>