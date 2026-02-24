<nav class="navbar navbar-dark bg-primary fixed-top navbar-expand-lg"> 
    <div class="container"> 
        <!-- Título + nombre de la página --> 
         <a class="navbar-brand fw-bold" href="#">
             Consultorio Médico | <?php echo $pageTitle; ?> 
        </a>
             
             <!-- Botón vista movil --> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button> 
            <!-- Menú colapsable --> 
                <div class="collapse navbar-collapse justify-content-end" id="menu">
                    <ul class="navbar-nav">
                        <?php if ($pageTitle !== 'Login' && $pageTitle !== 'Registro' && $pageTitle !=='Login ADMIN'): ?>
                            <li class="nav-item">
                                <a href="./auth/login.php" class="btn btn-light">Iniciar Sesión</a>
                            </li> 
                            <li class="nav-item"><a href="auth/registro.php" class="btn btn-warning">Registrarse</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
    </div>
</nav>