<?php

// Verificar sesión activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Detectar usuario logueado
$sesion_activa = isset($_SESSION['usuario_id']);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-3">

    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center"
           href="<?php echo BASE_URL; ?>index.php">

            <i class="bi bi-heart-pulse-fill text-primary fs-1 me-2"></i>

            <div class="d-flex flex-column">
                <span class="fw-bold lh-1"
                      style="color: #2c3e50; font-size: 1.4rem;">

                    Dr. Diego Rojas

                </span>

                <small class="text-muted lh-1 mt-1"
                       style="font-size: 0.8rem; letter-spacing: 0.5px;">

                    Médico General

                </small>
            </div>
        </a>

        <!-- BOTÓN HAMBURGUESA -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu"
                aria-controls="menu"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENÚ -->
        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <?php if ($sesion_activa): ?>

                    <!-- INICIO -->
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL; ?>index.php"
                           class="nav-link fw-bold text-primary">

                            <i class="bi bi-house-fill me-2"></i>
                            Inicio

                        </a>
                    </li>

                    <!-- DROPDOWN USUARIO -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle fw-bold text-primary d-flex align-items-center"
                           href="javascript:void(0)"
                           id="usuarioDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">

                            <i class="bi bi-person-circle me-2"></i>

                            <?php echo $_SESSION['usuario_nombre']; ?>

                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                            <li>
                                <a class="dropdown-item py-2"
                                   href="<?php echo BASE_URL; ?>paciente/panel.php">

                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Panel

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="<?php echo BASE_URL; ?>paciente/citas.php">

                                    <i class="bi bi-calendar-plus me-2"></i>
                                    Agendar Cita

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="<?php echo BASE_URL; ?>paciente/mis_citas.php">

                                    <i class="bi bi-clipboard2-pulse me-2"></i>
                                    Mis Citas

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item py-2"
                                   href="<?php echo BASE_URL; ?>paciente/perfil.php">

                                    <i class="bi bi-person-lines-fill me-2"></i>
                                    Mi Perfil

                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger py-2"
                                   href="<?php echo BASE_URL; ?>config/logout.php">

                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Salir

                                </a>
                            </li>

                        </ul>
                    </li>

                <?php else: ?>

                    <!-- VISITANTE -->
                    <li class="nav-item me-lg-2">
                        <a href="<?php echo BASE_URL; ?>index.php"
                           class="nav-link fw-bold text-primary">

                            Inicio

                        </a>
                    </li>

                    <li class="nav-item me-lg-2">
                        <a href="<?php echo BASE_URL; ?>auth/login.php"
                           class="btn btn-outline-primary rounded-pill px-4 fw-bold">

                            Iniciar Sesión

                        </a>
                    </li>

                    <li class="nav-item mt-2 mt-lg-0">
                        <a href="<?php echo BASE_URL; ?>auth/registro.php"
                           class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold">

                            Registrarse

                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>