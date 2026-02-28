<?php
include 'layout_admin.php';
include("../config/conexion.php");

/* =========================
   OBTENER CITAS
========================= */

$sql = "SELECT c.fecha, c.hora, p.nombre 
        FROM citas c
        JOIN pacientes p ON c.paciente_id = p.id
        ORDER BY c.fecha DESC, c.hora DESC";

$result = $conn->query($sql);
?>

<h2 class="admin-title mb-4">
    Listado General de Citas
</h2>

<div class="card admin-card p-4">

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-person-circle me-2"></i>Paciente</th>
                    <th><i class="bi bi-calendar-event me-2"></i>Fecha</th>
                    <th><i class="bi bi-clock me-2"></i>Hora</th>
                </tr>
            </thead>
            <tbody>

            <?php while ($row = $result->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['hora']; ?></td>
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