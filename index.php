<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Diego Rojas - Médico General</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<?php 
    $pageTitle = "Inicio";
    // Asegúrate de que esta ruta sea la correcta según tu estructura
    include 'paciente/estructura/navbar.php'; 
?>

<main>
    <section id="servicios" class="hero-principal d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-7 contenido-hero">
                    
                    <h1 class="titulo-principal-hero">
                        Atención médica profesional y de calidad para toda la familia.
                    </h1>

                    <div class="descripcion-hero">
                        <h2 class="h3 fw-semibold mb-3">Tratamientos y servicios</h2>
                        <p class="fs-5">
                            Ofrezco atención <strong>integral</strong> para el <strong>diagnóstico, control y seguimiento</strong> de enfermedades.
                        </p>
                    </div>

                    <div class="mt-4">
                        <a href="auth/login.php" class="btn btn-agendar-hero shadow-lg">
                            <i class="bi bi-calendar-check me-2"></i>Agendar Cita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 seccion-quienes" id="conocenos">
        <div class="container text-center">
            <h2 class="titulo-quienes mb-5">¿Quiénes Somos?</h2>
            
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button class="btn btn-outline-primary fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalHistoria">Nuestra historia</button>
                <button class="btn btn-outline-primary fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalMision">Misión</button>
                <button class="btn btn-outline-primary fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalVision">Visión</button>
                <button class="btn btn-outline-primary fw-bold px-4 py-2 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalValores">Valores</button>
            </div>
        </div>
    </section>
</main>

<?php include 'estructura/footer.php'; ?>

<div class="modal fade" id="modalHistoria" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title"><i class="bi bi-book me-2"></i>Nuestra Historia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-5">
                <i class="bi bi-hospital text-primary display-1"></i>
                <p class="fs-5 mt-4">Mi consultorio médico nació con el propósito de brindar atención médica accesible, profesional y humana a la comunidad.</p>
                <p class="text-muted">Hoy continuamos trabajando con la misma vocación que nos dio origen: cuidar la salud de cada persona con profesionalismo y calidez.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title"><i class="bi bi-heart-pulse me-2"></i>Misión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-bullseye text-primary display-3"></i>
                <p class="fs-5 mt-3">Brindar atención médica integral enfocado en la prevención, diagnóstico y tratamiento oportuno de nuestros pacientes.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title"><i class="bi bi-eye me-2"></i>Visión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-graph-up-arrow text-primary display-3"></i>
                <p class="fs-5 mt-3">Ser el consultorio médico líder en la región, reconocido por la calidez humana y la excelencia en salud primaria.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalValores" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white border-0">
                <h5 class="modal-title"><i class="bi bi-star me-2"></i>Nuestros Valores</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill text-primary me-3"></i>Ética y Honestidad</li>
                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill text-primary me-3"></i>Empatía con el paciente</li>
                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill text-primary me-3"></i>Compromiso Social</li>
                    <li class="list-group-item border-0"><i class="bi bi-check-circle-fill text-primary me-3"></i>Respeto y Dignidad</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<a href="https://wa.me/6681692524?text=Hola%20Dr.%20Diego,%20me%20gustaría%20agendar%20una%20cita" 
   class="whatsapp-float" 
   target="_blank">
    <i class="bi bi-whatsapp"></i>
    <span>¡Escríbenos!</span>
</a>

</body>
</html>