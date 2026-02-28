<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$paciente_id = $_SESSION['usuario_id'];
$nombreUsuario = isset($_SESSION['usuario_nombre']) ? explode(' ', $_SESSION['usuario_nombre'])[0] : 'Paciente';

// Consulta de próxima cita para el recordatorio
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
    <title>Panel de Paciente - Dr. Diego Rojas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

    <?php 
    $pageTitle = "Mi Panel";
    include 'estructura/navbar.php'; 
    ?>

    <main class="container py-5">
        
        <div class="row mb-5">
            <div class="col-12 text-center text-md-start">
                <h1 class="fw-bold">Hola, <span class="text-primary"><?php echo htmlspecialchars($nombreUsuario); ?></span> 👋</h1>
                <p class="text-muted fs-5">Bienvenido a tu portal de salud. Gestiona tus citas de forma sencilla.</p>
            </div>
        </div>

        <?php if ($proxima_cita): ?>
            <div class="row mb-5">
                <div class="col-12">
                    <div class="alert alert-primary border-0 shadow-sm rounded-4 d-flex align-items-center p-4">
                        <i class="bi bi-calendar-check-fill fs-2 me-4 text-primary"></i>
                        <div>
                            <h5 class="fw-bold mb-1">Recordatorio de Próxima Cita</h5>
                            <span class="text-dark">
                                Te esperamos el <strong><?php echo date('d/m/Y', strtotime($proxima_cita['fecha'])); ?></strong> 
                                a las <strong><?php echo date('h:i A', strtotime($proxima_cita['hora'])); ?></strong>.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row g-4 text-center">
            
            <div class="col-md-4">
                <div class="card card-servicio h-100 p-4 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-calendar-plus-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold">Agendar Cita</h4>
                        <p class="text-muted small mb-4">Reserva un espacio con el Dr. Rojas en segundos.</p>
                        <a href="../citas.php" class="btn btn-primary w-100 mt-auto">
                            Nueva Cita
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-servicio h-100 p-4 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-clipboard2-pulse-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold">Mis Consultas</h4>
                        <p class="text-muted small mb-4">Revisa tus citas agendadas y tu historial médico.</p>
                        <a href="mis_citas.php" class="btn btn-outline-primary rounded-pill fw-bold w-100 mt-auto py-2">
                            Ver Detalles
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-servicio h-100 p-4 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <i class="bi bi-person-vcard-fill fs-1"></i>
                        </div>
                        <h4 class="fw-bold">Mi Perfil</h4>
                        <p class="text-muted small mb-4">Actualiza tu teléfono, nombre o datos de contacto.</p>
                        <a href="perfil.php" class="btn btn-outline-secondary rounded-pill fw-bold w-100 mt-auto py-2">
                            Gestionar Cuenta
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?php include 'estructura/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>