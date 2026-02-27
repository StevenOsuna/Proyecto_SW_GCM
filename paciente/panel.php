<?php
session_start();

// Seguridad: Si no hay sesión, mandamos al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

// Obtenemos el nombre del usuario para personalizar la bienvenida
$nombreUsuario = isset($_SESSION['usuario_nombre']) ? explode(' ', $_SESSION['usuario_nombre'])[0] : 'Paciente';
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

    <?php 
    $pageTitle = "Mi Panel";
    include 'estructura/navbar.php'; 
    ?>

    <main class="container py-5" style="margin-top: 80px; min-height: 80vh;">
        
        <div class="row mb-5">
            <div class="col-12 text-center text-md-start">
                <h1 class="fw-bold text-dark">Hola, <span class="text-primary"><?php echo htmlspecialchars($nombreUsuario); ?></span> 👋</h1>
                <p class="text-muted">¿Qué desea realizar el día de hoy?</p>
            </div>
        </div>

        <div class="row g-4">
            
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 card-servicio p-4 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-calendar-plus-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="fw-bold">Agendar Cita</h4>
                        <p class="text-muted small">Reserve un horario para su próxima consulta médica de forma rápida.</p>
                        <div class="d-grid">
                            <a href="../citas.php" class="btn btn-primary rounded-pill fw-bold">
                                <i class="bi bi-plus-lg me-2"></i>Nueva Cita
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 card-servicio p-4 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-clipboard2-pulse-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="fw-bold">Mis Consultas</h4>
                        <p class="text-muted small">Consulte sus citas agendadas, pendientes o el historial de sus visitas.</p>
                        <div class="d-grid">
                            <a href="mis_citas.php" class="btn btn-outline-primary rounded-pill fw-bold">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100 card-servicio p-4 text-center">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-person-bounding-box text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="fw-bold">Mi Perfil</h4>
                        <p class="text-muted small">Actualice sus datos de contacto, teléfono o cambie su contraseña.</p>
                        <div class="d-grid">
                            <a href="perfil.php" class="btn btn-outline-secondary rounded-pill fw-bold">
                                Gestionar Cuenta
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5 d-md-none text-center">
            <div class="col-12">
                <a href="../logout.php" class="text-danger text-decoration-none fw-bold">
                    <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </main>

    <?php include 'estructura/footer.php'; ?> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>