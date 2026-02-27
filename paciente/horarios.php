<?php
session_start();
include("../config/conexion.php");

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$fecha = $_GET['fecha'] ?? date('Y-m-d');
// Formateamos la fecha para que se vea mejor (ej: 27/02/2026)
$fecha_formateada = date("d/m/Y", strtotime($fecha));

$horarios = ["09:00", "10:00", "11:00", "12:00", "13:00", "16:00", "17:00"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Hora - Dr. Diego Rojas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        /* Estilo para convertir los radio buttons en botones elegantes */
        .btn-check:checked + .btn-outline-primary {
            background-color: #007bff;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
            transform: translateY(-2px);
        }
        .btn-outline-primary {
            border-radius: 12px;
            padding: 15px;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 2px solid #eee;
            color: #444;
        }
        .btn-outline-primary:hover {
            border-color: #007bff;
            background: transparent;
            color: #007bff;
        }
    </style>
</head>
<body class="bg-light">

    <?php 
    $pageTitle = 'Seleccionar Hora';
    include '../estructura/navbar.php'; 
    ?>

    <main class="container py-5" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="text-center mb-4">
                            <div class="display-6 text-primary mb-2">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h2 class="fw-bold">Selecciona una hora</h2>
                            <p class="text-muted">Cita programada para el día:<br>
                               <span class="badge bg-primary-subtle text-primary fs-6 mt-1">
                                   <i class="bi bi-calendar-check me-1"></i> <?php echo $fecha_formateada; ?>
                               </span>
                            </p>
                        </div>

                        <form action="guardar_citas.php" method="POST">
                            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">

                            <div class="row g-3 mb-4">
                                <?php foreach ($horarios as $hora): ?>
                                    <div class="col-6 col-sm-4">
                                        <input type="radio" class="btn-check" name="hora" id="btn-<?php echo $hora; ?>" value="<?php echo $hora; ?>" required>
                                        <label class="btn btn-outline-primary w-100" for="btn-<?php echo $hora; ?>">
                                            <?php echo $hora; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <hr class="text-muted opacity-25">

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold py-3 shadow">
                                    Confirmar Cita <i class="bi bi-check-circle ms-2"></i>
                                </button>
                                <a href="../citas.php" class="btn btn-link text-decoration-none text-muted small">
                                    <i class="bi bi-arrow-left"></i> Cambiar fecha
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php include '../estructura/footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>