<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">

    <title>Registro Paciente</title>
</head>
<body>

<?php $pageTitle = "Registro";
include '../estructura/navbar.php';
?>

<main>

<form action="guardar_usuario.php" method="POST">

    Nombre:
    <input type="text" name="nombre" required><br><br>

    Teléfono:
    <input type="text" name="telefono"><br><br>

    Email:
    <input type="email" name="email" required><br><br>

    Contraseña:
    <input type="password" name="password" required><br><br>

    <button type="submit">Registrarse</button>

</form>

</main>

<?php include '../estructura/footer.php'; ?>
</body>
</html>