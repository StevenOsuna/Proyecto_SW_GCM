<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Dr. Diego Rojas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body class="bg-light">
    <?php 
    $pageTitle = "Login";
    include '../estructura/navbar.php';
    ?>

    <main class="container d-flex align-items-center justify-content-center" style="min-height: 85vh; padding-top: 50px; padding-bottom: 50px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
                
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="card-body p-5">
                        
                        <div class="text-center mb-4">
                            <div class="medico-logo-icon mb-3">
                                <i class="bi bi-shield-lock-fill display-4 text-primary"></i>
                            </div>
                            <h2 class="fw-bold text-dark">Bienvenido</h2>
                            <p class="text-muted small">Ingrese sus credenciales para continuar</p>
                        </div>

                        <form action="../validar_login.php" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control border-start-0" placeholder="correo@ejemplo.com" required />
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label fw-bold">Contraseña</label>
                                    <a href="#" class="text-primary small text-decoration-none">¿La olvidó?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="bi bi-lock text-primary"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control border-start-0" placeholder="********" required />
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">
                                    Ingresar
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-muted small mb-0">
                                    ¿Aún no tiene cuenta? 
                                    <a href="registro.php" class="text-primary fw-bold text-decoration-none">Regístrese aquí</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
                </div>
        </div>
    </main>

    <?php include '../estructura/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>