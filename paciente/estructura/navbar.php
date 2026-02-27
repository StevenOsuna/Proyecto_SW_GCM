<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm navbar-light"> 
    <div class="container"> 
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="bi bi-heart-pulse-fill text-primary me-2 medico-logo-icon"></i>
            <span class="nombre-doctor-nav">Dr. Diego Rojas</span>
        </a>
             
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span> 
        </button> 

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary" href="#conocenos">¿Quiénes somos?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-primary" href="#servicios">Servicios</a>
                </li>

                <li class="nav-item ms-lg-3">
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <a href="../config/logout.php" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                        </a>
                    <?php else: ?>
                        <div class="d-flex gap-2">
                            <a href="auth/login.php" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                                Iniciar Sesión
                            </a>
                            <a href="auth/registro.php" class="btn btn-primary rounded-pill px-4 fw-bold shadow-sm">
                                Registrarse
                            </a>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>