<?php
include 'layout_admin.php';
include("../config/conexion.php");

/* CAMBIAR ESTADO */
if (isset($_GET['toggle'])) {

    $id = $_GET['toggle'];

    $stmt = $conn->prepare("UPDATE horarios SET activo = NOT activo WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: admin_horarios.php");
    exit();
}

/* OBTENER HORARIOS */
$result = $conn->query("SELECT * FROM horarios ORDER BY hora ASC");
?>

<h2 class="admin-title mb-4">
    Configuración de Horarios
</h2>

<div class="card admin-card p-4">

    <div class="row g-4">

        <?php while($row = $result->fetch_assoc()): ?>

            <div class="col-6 col-md-3">

                <div class="card text-center p-3 shadow-sm">

                    <i class="bi bi-clock fs-4 mb-2 
                        <?php echo $row['activo'] ? 'text-success' : 'text-danger'; ?>">
                    </i>

                    <strong>
                        <?php echo date("H:i", strtotime($row['hora'])); ?>
                    </strong>

                    <div class="mt-3">

                        <?php if($row['activo']): ?>
                            <a href="?toggle=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-success">
                               Activo
                            </a>
                        <?php else: ?>
                            <a href="?toggle=<?php echo $row['id']; ?>" 
                               class="btn btn-sm btn-outline-danger">
                               Inactivo
                            </a>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        <?php endwhile; ?>

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