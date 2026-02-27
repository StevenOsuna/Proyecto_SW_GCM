<?php
// 1. Detectamos la profundidad de la carpeta para ajustar las rutas
// Si estamos en una subcarpeta (auth, pacientes), necesitamos "../" para volver a la raíz
$base_path = (dirname($_SERVER['PHP_SELF']) == '/' || dirname($_SERVER['PHP_SELF']) == '\\') ? '' : '../';

// Si estamos específicamente en index.php, la ruta es vacía
if (basename($_SERVER['PHP_SELF']) == 'index.php') {
    $base_path = '';
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo $base_path; ?>index.php">
            <i class="bi bi-heart-pulse-fill text-primary fs-1 me-2"></i>
            <div class="d-flex flex-column">
                <span class="fw-bold lh-1" style="color: #2c3e50; font-size: 1.4rem;">Dr. Diego Rojas</span>
                <small class="text-muted lh-1 mt-1" style="font-size: 0.8rem; letter-spacing: 0.5px;">Médico General</small>
            </div>
        </a>
             
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span> 
        </button> 

        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <ul class="navbar-nav align-items-center">
                
                <li class="nav-item me-3">
                    <a href="<?php echo $base_path; ?>index.php" class="nav-link fw-bold text-primary">
                        <i class="bi bi-house-door-fill me-1"></i> Inicio
                    </a>
                </li>

                <?php 
                // Si el usuario tiene sesión activa (como Duma)
                if (isset($_SESSION['usuario_id'])): ?>
                    <li class="nav-item">
                        <a href="<?php echo $base_path; ?>logout.php" class="btn btn-outline-danger rounded-pill px-4 shadow-sm fw-bold">
                            <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                        </a>
                    </li>

                <?php 
                // Si NO hay sesión y NO estamos ya en Login/Registro
                elseif ($pageTitle !== 'Login' && $pageTitle !== 'Registro' && $pageTitle !== 'Login ADMIN'): ?>
                    <li class="nav-item">
                        <a href="<?php echo $base_path; ?>auth/login.php" class="btn btn-outline-primary rounded-pill px-4 me-2 fw-bold">Iniciar Sesión</a>
                    </li> 
                    <li class="nav-item">
                        <a href="<?php echo $base_path; ?>auth/registro.php" class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">Registrarse</a>
                    </li>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</nav>