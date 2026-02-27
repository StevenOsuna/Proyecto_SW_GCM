<?php
session_start();
// Validamos sesión
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
    <title>Agendar Cita - Dr. Diego Rojas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/style.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>

<body class="bg-light">

    <?php 
    $pageTitle = 'Agendar Cita';
    include 'estructura/navbar.php'; 
    ?>

    <main class="container py-5" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="d-flex align-items-center mb-4">
                    <a href="paciente/panel.php" class="btn btn-outline-primary rounded-circle me-3 shadow-sm">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-0">Agendar Cita</h2>
                        <p class="text-muted mb-0">Seleccione el día que desea visitar al Dr. Rojas</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <div id="calendar"></div>
                    </div>
                </div>

                <div class="text-center mt-4 text-secondary small">
                    <i class="bi bi-info-circle me-1"></i> 
                    Hoy es <?php echo date('d/m/Y'); ?>. Los domingos y días pasados no están disponibles.
                </div>
            </div>
        </div>
    </main>

    <?php include 'estructura/footer.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            height: 'auto',
            
            validRange: {
                start: new Date().toISOString().split('T')[0] 
            },

            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            buttonText: { today: 'Hoy' },
            events: 'api/obtener_citas.php', 

            dayCellDidMount: function(info) {
                var numberEl = info.el.querySelector('.fc-daygrid-day-number');
                
                // Obtener el día de la semana (0 = Domingo, 1 = Lunes, etc.)
                var dayOfWeek = info.date.getUTCDay();

                // 1. Estilo base para números
                if (numberEl) {
                    numberEl.style.color = '#212529'; 
                    numberEl.style.fontWeight = '700';
                    numberEl.style.zIndex = '10';
                    numberEl.style.position = 'relative';
                }

                // 2. BLOQUEO DE DOMINGOS
                if (dayOfWeek === 0) {
                    info.el.style.backgroundColor = '#ebebeb'; // Gris más oscuro para cerrado
                    info.el.style.cursor = 'not-allowed';
                    if (numberEl) {
                        numberEl.style.color = '#bbbbbb';
                        numberEl.style.textDecoration = 'line-through'; // Tachado opcional
                    }
                }

                // 3. Días pasados
                if (info.isPast) {
                    info.el.style.backgroundColor = '#f2f2f2';
                    if (numberEl) {
                        numberEl.style.color = '#999999';
                    }
                }

                // 4. Resaltado de Hoy
                if (info.isToday) {
                    if (numberEl) {
                        numberEl.style.color = '#ffffff';
                    }
                }
            },

            dateClick: function(info) {
                var hoy = new Date();
                hoy.setHours(0,0,0,0);
                
                // Usamos getUTCDay para evitar problemas de zona horaria con la fecha del string
                var fechaSeleccionada = new Date(info.dateStr + 'T00:00:00');
                var diaSemana = fechaSeleccionada.getUTCDay();

                // VALIDACIÓN: Si es Domingo
                if (diaSemana === 0) {
                    alert("Lo sentimos, los domingos no hay consulta disponible.");
                    return false;
                }

                // Redirigir si es hoy o futuro
                if (fechaSeleccionada >= hoy) {
                    window.location.href = "paciente/horarios.php?fecha=" + info.dateStr;
                }
            }
        });

        calendar.render();
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>