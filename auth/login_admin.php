<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: ../admin/admin_panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>

<?php 
$pageTitle = "Login Administrador";
include '../estructura/navbar.php';
?>

<main class="container d-flex justify-content-center align-items-center" style="min-height:70vh;">

    <div class="col-md-5 col-lg-4">

        <div class="card shadow border-0" style="border-radius:20px;">
            <div class="card-body p-4">

                <h4 class="text-center mb-4 fw-bold text-primary">
                    Panel Administrativo
                </h4>

                <!-- 🔥 MENSAJES DE ERROR -->
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        if ($_GET['error'] == "campos") {
                            echo "Todos los campos son obligatorios.";
                        } elseif ($_GET['error'] == "pass") {
                            echo "Contraseña incorrecta.";
                        } elseif ($_GET['error'] == "user") {
                            echo "Usuario no encontrado.";
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <form action="../admin/validar_admin.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Usuario</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Ingresar
                    </button>

                </form>

            </div>
        </div>

    </div>

</main>

<?php include '../estructura/footer.php'; ?>

</body>
</html>