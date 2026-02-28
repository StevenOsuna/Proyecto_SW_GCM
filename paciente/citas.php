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
    <title>Agendar Cita - Dr. Diego Rojas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
            validRange: { start: new Date().toISOString().split('T')[0] },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            },
            buttonText: { today: 'Hoy' },
            events: 'api/obtener_citas.php', 

            dayCellDidMount: function(info) {
                var numberEl = info.el.querySelector('.fc-daygrid-day-number');
                var dayOfWeek = info.date.getUTCDay();

                // Asegurar visibilidad del número
                if (numberEl) {
                    numberEl.style.color = '#212529'; 
                    numberEl.style.fontWeight = '700';
                    numberEl.style.position = 'relative';
                    numberEl.style.zIndex = '5';
                }

                // Color para hoy (número blanco)
                if (info.isToday && numberEl) {
                    numberEl.style.color = '#ffffff';
                }
            },

            dateClick: function(info) {
                var hoy = new Date();
                hoy.setHours(0,0,0,0);
                var fechaSeleccionada = new Date(info.dateStr + 'T00:00:00');
                var diaSemana = fechaSeleccionada.getUTCDay();

                // Validación de Domingos con SweetAlert2
                if (diaSemana === 0) {
                    Swal.fire({
                        title: 'Día Cerrado',
                        text: 'Los domingos no se ofrece consulta médica. Por favor, selecciona otro día.',
                        icon: 'info',
                        confirmButtonText: 'Entendido',
                        confirmButtonColor: '#007bff'
                    });
                    return false;
                }

                // Redirección si es hoy o futuro
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