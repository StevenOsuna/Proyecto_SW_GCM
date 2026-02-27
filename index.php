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
    include 'estructura/navbar.php'; 
?>

<main>
    <header class="bg-light p-5 text-center border-bottom">
        <div class="container py-5">
            <h1 class="titulo-bienvenida text-primary">Bienvenidos</h1>
            <p class="lead fs-4">Atención médica profesional y de calidad para toda la familia.</p>
            <div class="mt-4">
                <a href="auth/login.php" class="btn btn-primary btn-lg px-5 shadow-sm">
                    <i class="bi bi-calendar-check me-2"></i>Agendar Cita
                </a>
            </div>
        </div>
    </header>

    <section class="hero d-flex align-items-center justify-content-center text-center py-5" id="conocenos" 
             style="background: linear-gradient(rgba(0, 123, 255, 0.9), rgba(0, 123, 255, 0.5)), 
                    url('https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=1350&q=80') center/cover no-repeat; min-height: 400px;">
        
        <div class="container">
            <h1 class="titulo-quienes fw-bold text-white mb-4">¿Quiénes Somos?</h1>
            
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button class="btn btn-light fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalHistoria">Nuestra historia</button>
                <button class="btn btn-light fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalMision">Misión</button>
                <button class="btn btn-light fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalVision">Visión</button>
                <button class="btn btn-light fw-bold px-4 py-2" data-bs-toggle="modal" data-bs-target="#modalValores">Valores</button>
            </div>
        </div>
    </section>
</main>

<?php include 'estructura/footer.php'; ?>

<div class="modal fade" id="modalHistoria" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-book me-2"></i>Nuestra Historia</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-hospital-fill text-primary" style="font-size: 3rem;"></i>
                <p class="fs-5 mt-3">Nuestro consultorio médico nació con el propósito de brindar atención médica accesible, profesional y humana a la comunidad.</p>
                <p class="fs-5 text-muted">Hoy continuamos trabajando con la misma vocación que nos dio origen: cuidar la salud de cada persona con profesionalismo, calidez y compromiso.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-heart-pulse me-2"></i>Misión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-bullseye text-primary" style="font-size: 3rem;"></i>
                <p class="fs-5 mt-3">Brindar atención médica integral, profesional y humanizada, enfocada en la prevención, diagnóstico y tratamiento oportuno.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-eye me-2"></i>Visión</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-graph-up-arrow text-primary" style="font-size: 3rem;"></i>
                <p class="fs-5 mt-3">Consolidarnos como un consultorio médico de referencia, reconocido por la excelencia en el servicio y el trato humano.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalValores" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-star me-2"></i>Nuestros Valores</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <ul class="list-group list-group-flush fs-5">
                    <li class="list-group-item"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Ética:</strong> Honestidad profesional.</li>
                    <li class="list-group-item"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Empatía:</strong> Comprendemos al paciente.</li>
                    <li class="list-group-item"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Compromiso:</strong> Atención de calidad.</li>
                    <li class="list-group-item"><i class="bi bi-check2-circle text-primary me-2"></i><strong>Respeto:</strong> Dignidad y calidez.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>