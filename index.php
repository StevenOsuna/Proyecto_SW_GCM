<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<?php $pageTitle = "Inicio";
include 'navbar.php';
?>

<main>
<header class="bg-light p-5 text-center">
    <h1>Bienvenidos</h1>
    <p>Atención médica profesional y de calidad</p>
    <a href="login.html" class="btn btn-primary">Agendar Cita</a>
</header>




<!-- seccion conocenos -->
<section class="hero d-flex align-items-center justify-content-center text-center" id="conocenos" style="
           background: linear-gradient(#007bff, #007bff74)
           center/cover no-repeat;">
    <div class="container flex-column align-items-start m-5">
        <h1 class="display-5 fw-bold text-white">Conoce un poco de Nosotros</h1>

        <a class="btn btn-primary mt-3 mx-2" data-bs-toggle="modal" data-bs-target="#modalHistoria">Nuestra historia</a>
        <a class="btn btn-primary mt-3 mx-2" data-bs-toggle="modal" data-bs-target="#modalMision">Misión</a>
        <a class="btn btn-primary mt-3 mx-2" data-bs-toggle="modal" data-bs-target="#modalVision">Visión</a>
        <a class="btn btn-primary mt-3 mx-2" data-bs-toggle="modal" data-bs-target="#modalValores">Valores</a>

    </div>
    </section>

</main>
<!--Footer -->
<?php include 'footer.php'; ?> 

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>


<!--Modales de la secccion conocenos -->
<!--Modal Historia-->
<div class="modal fade" id="modalHistoria" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Nuestra Historia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h1>Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
    </div>
</div>

<!--Modal Mision-->
<div class="modal fade" id="modalMision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Misión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h1>Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
    </div>
</div>

<!--Modal Vision-->
<div class="modal fade" id="modalVision" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Visión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h1>Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
    </div>
</div>

<!--Modal Valores-->
<div class="modal fade" id="modalValores" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Valores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h1>Lorem ipsum dolor sit amet.</h1>
            </div>
        </div>
    </div>
</div>