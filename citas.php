<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita</title>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

</head>

<body>

<h2>Agendar Cita</h2>

<div id="calendar" style="max-width:900px; margin:auto;"></div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: 'es',

        events: 'api/obtener_citas.php', // ← aquí cargamos colores desde BD

        dateClick: function(info) {

            var fecha = info.dateStr;
            window.location.href = "paciente/horarios.php?fecha=" + fecha;

        }

    });

    calendar.render();

});

</script>

<br>

<a href="paciente/panel.php">Volver al Panel</a>

</body>
</html>