<?php
// Aseguramos que la sesión esté activa para leer los datos
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Detectar ruta base según tu estructura de carpetas
$current_dir = basename(dirname($_SERVER['PHP_SELF']));
$base_path = ($current_dir == 'paciente' || $current_dir == 'auth' || $current_dir == 'config') ? '../' : '';
if (basename($_SERVER['PHP_SELF']) == 'index.php') { $base_path = ''; }

// Verificamos si hay alguien logueado (intentamos con varios nombres comunes por si acaso)
$sesion_activa = isset($_SESSION['usuario_id']) || isset($_SESSION['id']) || isset($_SESSION['usuario_nombre']);
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

        <div class="collapse navbar-collapse justify-content-end" id="menu">
            <ul class="navbar-nav align-items-center">
                
                <?php if ($sesion_activa): ?>
                    <li class="nav-item">
                        <a href="<?php echo $base_path; ?>index.php" class="nav-link fw-bold text-primary d-flex align-items-center">
                            <i class="bi bi-house-fill me-2"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a href="<?php echo $base_path; ?>config/logout.php" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold">
                            Salir
                        </a>
                    </li>

                <?php else: ?>
                    <li class="nav-item me-3">
                        <a href="<?php echo $base_path; ?>index.php" class="nav-link fw-bold text-primary">Inicio</a>
                    </li>
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