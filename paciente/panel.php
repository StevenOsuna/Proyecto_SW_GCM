<?php
session_start();
include("../config/conexion.php");

// Seguridad: Redirigir si no hay sesión activa
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$paciente_id = $_SESSION['usuario_id'];
$nombreUsuario = isset($_SESSION['usuario_nombre']) ? explode(' ', $_SESSION['usuario_nombre'])[0] : 'Paciente';

// Consulta para obtener la cita más cercana
$sql_proxima = "SELECT fecha, hora FROM citas 
                WHERE paciente_id = ? AND fecha >= CURDATE() 
                ORDER BY fecha ASC, hora ASC LIMIT 1";
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
    <title>Mi Panel - Dr. Diego Rojas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-light">

    <?php 
    $pageTitle = "Mi Panel";
    include 'estructura/navbar.php'; 
    ?>

    <main class="container panel-container">
        
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold">Hola, <span class="text-primary"><?php echo htmlspecialchars($nombreUsuario); ?></span> 👋</h1>
                <p class="text-muted">Bienvenido a tu portal de salud. ¿Qué haremos hoy?</p>
            </div>
        </div>

        <?php if ($proxima_cita): ?>
            <div class="alert alert-custom d-flex align-items-center mb-5 shadow-sm">
                <i class="bi bi-calendar2-check-fill me-3 fs-3"></i>
                <div>
                    <strong>Recordatorio:</strong> Tienes una cita el 
                    <span><?php echo date('d/m/Y', strtotime($proxima_cita['fecha'])); ?></span> 
                    a las <span><?php echo date('h:i A', strtotime($proxima_cita['hora'])); ?></span>.
                </div>
            </div>
        <?php endif; ?>

        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="card card-action h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-calendar-plus icon-main"></i>
                        <h4 class="fw-bold">Agendar Cita</h4>
                        <p class="text-muted small">Elige el mejor horario para tu consulta.</p>
                        <a href="../citas.php" class="btn btn-primary rounded-pill w-100 fw-bold">Nueva Cita</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-action h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-journal-medical icon-main text-success"></i>
                        <h4 class="fw-bold">Mis Consultas</h4>
                        <p class="text-muted small">Revisa tu historial y citas activas.</p>
                        <a href="mis_citas.php" class="btn btn-outline-success rounded-pill w-100 fw-bold">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-action h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <i class="bi bi-person-badge icon-main text-info"></i>
                        <h4 class="fw-bold">Mi Perfil</h4>
                        <p class="text-muted small">Actualiza tus datos y contacto.</p>
                        <a href="perfil.php" class="btn btn-outline-info rounded-pill w-100 fw-bold">Gestionar</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php include 'estructura/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>