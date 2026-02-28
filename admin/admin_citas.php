<?php
include 'layout_admin.php';
include("../config/conexion.php");

/* =========================
   OBTENER CITAS
========================= */

$sql = "SELECT c.id, c.fecha, c.hora, p.nombre 
        FROM citas c
        JOIN pacientes p ON c.paciente_id = p.id
        ORDER BY c.fecha DESC, c.hora DESC";

$result = $conn->query($sql);
?>

<h2 class="admin-title mb-4">
    Gestión de Citas
</h2>

<div class="card admin-card p-4">

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>

            <?php while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <td>
                        <i class="bi bi-person-circle text-primary me-2"></i>
                        <?php echo $row['nombre']; ?>
                    </td>

                    <td>
                        <i class="bi bi-calendar-event text-primary me-2"></i>
                        <?php echo $row['fecha']; ?>
                    </td>

                    <td>
                        <i class="bi bi-clock text-primary me-2"></i>
                        <?php echo $row['hora']; ?>
                    </td>

                    <td class="text-center">
                        <a href="eliminar_cita.php?id=<?php echo $row['id']; ?>"
                           class="btn btn-sm btn-outline-danger"
                           onclick="return confirm('¿Seguro que deseas eliminar esta cita?')">
                           <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>

</div>

<div class="mt-4">
    <a href="admin_panel.php" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
</div>

</main>
<?php include '../estructura/footer.php'; ?>
</body>
</html>