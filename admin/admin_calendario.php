<?php
include 'layout_admin.php';
require_once("../config/conexion.php");

/* =========================
   OBTENER CITAS
========================= */

$sql = "SELECT citas.*, pacientes.nombre 
        FROM citas 
        JOIN pacientes ON citas.paciente_id = pacientes.id";

$resultado = $conn->query($sql);

$eventos = [];

while ($fila = $resultado->fetch_assoc()) {
    $eventos[] = [
        'title' => $fila['nombre'] . " - " . $fila['hora'],
        'start' => $fila['fecha'],
        'color' => '#28a745'
    ];
}

/* =========================
   DÍAS BLOQUEADOS
========================= */

$sql2 = "SELECT * FROM dias_bloqueados";
$res2 = $conn->query($sql2);

while ($bloq = $res2->fetch_assoc()) {
    $eventos[] = [
        'title' => 'NO LABORAL',
        'start' => $bloq['fecha'],
        'color' => '#dc3545'
    ];
}
?>

<h2 class="admin-title mb-4">
    Calendario General del Consultorio
</h2>

<div class="card admin-card p-4">

    <div id="calendar"></div>

</div>

<div class="mt-4">
    <a href="admin_panel.php" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left"></i> Volver al Panel
    </a>
</div>

<!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',
        locale: 'es',

        events: <?php echo json_encode($eventos); ?>,

        height: 650,

        dateClick: function(info) {

            if(confirm("¿Deseas bloquear este día?")) {
                window.location.href = "bloquear_dia.php?fecha=" + info.dateStr;
            }

        }

    });

    calendar.render();

});
</script>

</main>
<?php include '../estructura/footer.php'; ?>
</body>
</html>