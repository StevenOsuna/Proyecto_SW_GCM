<?php
session_start();
include("../config/conexion.php");

// 1. Seguridad: Si no hay sesión, al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$id_paciente = $_SESSION['usuario_id'];

// 2. Obtener datos actuales de la tabla 'pacientes'
$query = "SELECT nombre, correo, telefono FROM pacientes WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_paciente);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Dr. Diego Rojas</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-light">

    <?php 
    $pageTitle = "Mi Perfil";
    include 'estructura/navbar.php'; 
    ?>

    <main class="container py-5" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                
                <div class="d-flex align-items-center mb-4">
                    <a href="panel.php" class="btn btn-outline-primary rounded-circle me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h2 class="fw-bold mb-0">Mi Perfil</h2>
                </div>

                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <div class="text-center mb-4">
                        <div class="d-inline-block p-3 bg-primary-subtle rounded-circle mb-3">
                            <i class="bi bi-person-vcard text-primary" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="fw-bold mb-0"><?php echo htmlspecialchars($usuario['nombre']); ?></h5>
                        <p class="text-muted small">Gestiona tu información personal</p>
                    </div>

                    <form action="actualizar_perfil.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">Nombre Completo</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-person"></i></span>
                                <input type="text" name="nombre" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($usuario['correo']); ?>" disabled>
                            </div>
                            <div class="form-text px-2">El correo no se puede modificar por seguridad.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary">Número de Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-telephone"></i></span>
                                <input type="tel" name="telefono" class="form-control bg-light border-0" value="<?php echo htmlspecialchars($usuario['telefono']); ?>">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill fw-bold py-2 shadow-sm">
                                <i class="bi bi-check2-circle me-2"></i>Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>

    <?php include 'estructura/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
