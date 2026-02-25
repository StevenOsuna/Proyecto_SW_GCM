<?php
session_start();
require_once("../config/conexion.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin/admin_login.php");
    exit();
}

/* CITAS */
$sql = "SELECT citas.*, pacientes.nombre 
        FROM citas 
        JOIN pacientes ON citas.usuario_id = pacientes.id";

$resultado = $conn->query($sql);

$eventos = [];

while ($fila = $resultado->fetch_assoc()) {
    $eventos[] = [
        'title' => $fila['nombre'] . " - " . $fila['hora'],
        'start' => $fila['fecha'],
        'color' => '#28a745'
    ];
}

/* DIAS BLOQUEADOS */
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

<!DOCTYPE html>
<html>
<head>

<title>Calendario Administrador</title>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

</head>

<body>

<h2>Calendario de Citas</h2>

<div id="calendar"></div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        events: <?php echo json_encode($eventos); ?>,

        dateClick: function(info) {

            if(confirm("¿Bloquear este día?")) {
                window.location.href = "../bloquear_dia.php?fecha=" + info.dateStr;
            }

        }

    });

    calendar.render();

});

</script>

<br>
<a href="admin/admin_panel.php">Volver</a>

</body>
</html>