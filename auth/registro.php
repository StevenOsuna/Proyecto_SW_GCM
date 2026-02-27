<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Registro Paciente - Dr. Diego Rojas</title>
</head>

<body class="bg-light">

    <?php 
    $pageTitle = "Registro";
    // El navbar ya contiene el botón de "Inicio" que corregimos
    include '../estructura/navbar.php'; 
    ?>

    <main class="container d-flex align-items-center justify-content-center" style="min-height: 80vh; margin-top: 100px; margin-bottom: 50px;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-5">
                
                <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                    <div class="card-body p-5">
                        
                        <div class="text-center mb-4">
                            <div class="medico-logo-icon mb-2">
                                <i class="bi bi-person-plus-fill display-4 text-primary"></i>
                            </div>
                            <h2 class="fw-bold">Crear Cuenta</h2>
                            <p class="text-muted">Complete sus datos para registrarse</p>
                        </div>

                        <form action="../guardar_usuario.php" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre Completo</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-person text-primary"></i></span>
                                    <input type="text" name="nombre" class="form-control border-start-0" placeholder="Ej. Diego Rojas" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Teléfono</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-telephone text-primary"></i></span>
                                    <input type="text" name="telefono" class="form-control border-start-0" placeholder="668 000 0000">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope text-primary"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0" placeholder="nombre@correo.com" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock text-primary"></i></span>
                                    <input type="password" name="password" class="form-control border-start-0" placeholder="********" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm">
                                    Registrarse
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="text-muted small">¿Ya tiene una cuenta? <a href="login.php" class="text-primary fw-bold text-decoration-none">Inicie Sesión</a></p>
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