<?php
session_start();
include("../config/conexion.php"); // Asegúrate de que esta ruta sea correcta

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$paciente_id = $_SESSION['usuario_id'];

// Consulta para traer las citas del paciente logueado
$sql = "SELECT id, fecha, hora FROM citas WHERE paciente_id = ? ORDER BY fecha DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $paciente_id);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Consultas - Dr. Diego Rojas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-light">

    <?php 
    $pageTitle = "Mis Consultas";
    include 'estructura/navbar.php'; 
    ?>

    <main class="container py-5" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex align-items-center mb-4">
                    <a href="panel.php" class="btn btn-outline-primary rounded-circle me-3">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <h2 class="fw-bold mb-0">Mis Consultas</h2>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-white">
                                <tr>
                                    <th class="px-4 py-3">Fecha</th>
                                    <th class="py-3">Hora</th>
                                    <th class="py-3">Estado</th>
                                    <th class="py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($resultado->num_rows > 0): ?>
                                    <?php while($cita = $resultado->fetch_assoc()): ?>
                                        <tr>
                                            <td class="px-4 fw-bold"><?php echo date('d/m/Y', strtotime($cita['fecha'])); ?></td>
                                            <td><?php echo date('h:i A', strtotime($cita['hora'])); ?></td>
                                            <td>
                                                <?php 
                                                $hoy = date('Y-m-d');
                                                if ($cita['fecha'] < $hoy) {
                                                    echo '<span class="badge bg-light text-muted border rounded-pill">Completada</span>';
                                                } else {
                                                    echo '<span class="badge bg-primary-subtle text-primary rounded-pill">Próxima</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($cita['fecha'] >= $hoy): ?>
                                                    <button onclick="confirmarCancelacion(<?php echo $cita['id']; ?>)" class="btn btn-link text-danger p-0">
                                                        <i class="bi bi-trash"></i> Cancelar
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">No tienes citas registradas.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    function confirmarCancelacion(id) {
        Swal.fire({
            title: '¿Cancelar cita?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, cancelar',
            cancelButtonText: 'No, volver',
            customClass: { popup: 'rounded-4' }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "eliminar_cita.php?id=" + id;
            }
        })
    }
    </script>
</body>
</html>
